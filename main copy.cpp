#include <winsock2.h>
#include <ws2tcpip.h>
#include <iostream>
#include <string>
#include <thread>
#include <vector>
#include <mutex>

#pragma comment(lib, "ws2_32.lib") // Link Winsock library

#define PORT 8080
#define BUFFER_SIZE 2048

std::mutex consoleMutex; // For thread-safe logging

// Function to handle a single client request
void handleRequest(SOCKET clientSocket) {
    try {
        char buffer[BUFFER_SIZE] = { 0 };
        int bytesReceived = recv(clientSocket, buffer, BUFFER_SIZE, 0);

        if (bytesReceived > 0) {
            std::string request(buffer);

            // Log the request
            {
                std::lock_guard<std::mutex> lock(consoleMutex);
                std::cout << "Received request:\n" << request << std::endl;
            }

            // Extract the requested path
            std::string path = "/";
            size_t pos1 = request.find(" ");
            size_t pos2 = request.find(" ", pos1 + 1);
            if (pos1 != std::string::npos && pos2 != std::string::npos) {
                path = request.substr(pos1 + 1, pos2 - pos1 - 1);
            }

            // Validate the path (ensure it's safe)
            if (path.find("..") != std::string::npos) {
                path = "/invalid";
            }

            // Prepare HTML response
            std::string responseBody =
                "<html><body><h1>You requested: " + path + "</h1></body></html>";
            std::string response =
                "HTTP/1.1 200 OK\r\n"
                "Content-Type: text/html\r\n"
                "Content-Length: " + std::to_string(responseBody.size()) + "\r\n"
                "\r\n" +
                responseBody;

            // Send the response
            send(clientSocket, response.c_str(), response.size(), 0);
        }
    }
    catch (const std::exception& e) {
        {
            std::lock_guard<std::mutex> lock(consoleMutex);
            std::cerr << "Error handling request: " << e.what() << std::endl;
        }
    }

    // Close the client socket
    closesocket(clientSocket);
}

// Function to run the server and handle multiple clients
void runServer() {
    WSADATA wsaData;
    SOCKET serverSocket;
    struct sockaddr_in serverAddr, clientAddr;

    // Initialize Winsock
    if (WSAStartup(MAKEWORD(2, 2), &wsaData) != 0) {
        std::cerr << "WSAStartup failed: " << WSAGetLastError() << std::endl;
        return;
    }

    // Create the server socket
    serverSocket = socket(AF_INET, SOCK_STREAM, 0);
    if (serverSocket == INVALID_SOCKET) {
        std::cerr << "Socket creation failed: " << WSAGetLastError() << std::endl;
        WSACleanup();
        return;
    }

    // Setup server address
    serverAddr.sin_family = AF_INET;
    serverAddr.sin_addr.s_addr = INADDR_ANY;
    serverAddr.sin_port = htons(PORT);

    // Bind the socket
    if (bind(serverSocket, (struct sockaddr*)&serverAddr, sizeof(serverAddr)) == SOCKET_ERROR) {
        std::cerr << "Bind failed: " << WSAGetLastError() << std::endl;
        closesocket(serverSocket);
        WSACleanup();
        return;
    }

    // Listen for incoming connections
    if (listen(serverSocket, SOMAXCONN) == SOCKET_ERROR) {
        std::cerr << "Listen failed: " << WSAGetLastError() << std::endl;
        closesocket(serverSocket);
        WSACleanup();
        return;
    }

    std::cout << "Server is listening on port " << PORT << "...\n";

    // Accept and handle incoming connections
    int clientAddrSize = sizeof(clientAddr);
    std::vector<std::thread> threads;

    while (true) {
        SOCKET clientSocket = accept(serverSocket, (struct sockaddr*)&clientAddr, &clientAddrSize);
        if (clientSocket == INVALID_SOCKET) {
            std::cerr << "Accept failed: " << WSAGetLastError() << std::endl;
            continue;
        }

        // Handle each client in a separate thread
        threads.emplace_back(std::thread(handleRequest, clientSocket));
    }

    // Close the server socket
    closesocket(serverSocket);
    WSACleanup();

    // Join all threads before exiting
    for (auto& t : threads) {
        if (t.joinable())
            t.join();
    }
}

int mainY() {
    runServer();
    return 0;
}
