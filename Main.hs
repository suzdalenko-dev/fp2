main :: IO ()
main = do
    let x = 5
    let result = if x > 3 then "Mayor que 3" else "Menor o igual a 3"
    putStrLn result
