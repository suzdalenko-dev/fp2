Proyección € MES = 
    -- Variables para convertir las fechas seleccionadas (formato texto) a fechas
    VAR FechaInicioTexto = MIN(dFechas[EjercicioMesDia]) -- Texto seleccionado más bajo
    VAR FechaFinTexto = MAX(dFechas[EjercicioMesDia])   -- Texto seleccionado más alto

    -- Convertir texto a tipo fecha
    VAR FechaInicio = DATEVALUE(FechaInicioTexto)
    VAR FechaFin = DATEVALUE(FechaFinTexto)

    -- Calcular el número total de días en el mes correspondiente a la fecha más alta seleccionada
    VAR DiasDelMes = DAY(EOMONTH(FechaFin, 0))

    -- Calcular el número de días seleccionados en el rango
    VAR DiasSeleccionados = DATEDIFF(FechaInicio, FechaFin, DAY) + 1

    VAR ProyeccionEur = [Venta € Abel] / DiasSeleccionados * DiasDelMes

    RETURN
        ProyeccionEur


Proyección kg MES = 
    -- Variables para convertir las fechas seleccionadas (formato texto) a fechas
    VAR FechaInicioTexto = MIN(dFechas[EjercicioMesDia]) -- Texto seleccionado más bajo
    VAR FechaFinTexto = MAX(dFechas[EjercicioMesDia])   -- Texto seleccionado más alto

    -- Convertir texto a tipo fecha
    VAR FechaInicio = DATEVALUE(FechaInicioTexto)
    VAR FechaFin = DATEVALUE(FechaFinTexto)

    -- Calcular el número total de días en el mes correspondiente a la fecha más alta seleccionada
    VAR DiasDelMes = DAY(EOMONTH(FechaFin, 0))

    -- Calcular el número de días seleccionados en el rango
    VAR DiasSeleccionados = DATEDIFF(FechaInicio, FechaFin, DAY) + 1

    VAR ProyeccionEur = [Venta kg Abel] / DiasSeleccionados * DiasDelMes

    RETURN
        ProyeccionEur



Venta € anterior MES = 
-- Variables para convertir las fechas seleccionadas (formato texto) a fechas
VAR FechaInicioTexto = MIN(dFechas[EjercicioMesDia]) -- Fecha seleccionada más baja (texto)
VAR FechaFinTexto = MAX(dFechas[EjercicioMesDia])   -- Fecha seleccionada más alta (texto)

-- Convertir texto a tipo fecha
VAR FechaInicio = DATEVALUE(FechaInicioTexto)
VAR FechaFin = DATEVALUE(FechaFinTexto)

-- Calcular las fechas del rango del año anterior
VAR FechaInicioAnioAnterior = EDATE(FechaInicio, -12)
VAR FechaFinAnioAnterior = EDATE(FechaFin, -12)

-- Calcular las ventas para el rango del año anterior
VAR VentasAnioAnterior =
    CALCULATE(
        [Venta € Abel],
        FILTER(
            ALL('abel_fvent_fech'),
            'abel_fvent_fech'[fecha] >= FechaInicioAnioAnterior &&
            'abel_fvent_fech'[fecha] <= FechaFinAnioAnterior
        )
    )

RETURN
    VentasAnioAnterior


Venta € anterior entre fechas = 
IF(
    [Dias_Mes_O_Ano] = [Dias_Pasados_Mes], 
    [Abel Venta € anterior], 
    [Abel Venta € anterior] / [Dias_Mes_O_Ano] * ([Dias_Pasados_Mes] - 1)
)


Venta € anterior MES = 
-- Variables para convertir las fechas seleccionadas (formato texto) a fechas
VAR FechaInicioTexto = MIN(dFechas[EjercicioMesDia]) -- Fecha seleccionada más baja (texto)
VAR FechaFinTexto = MAX(dFechas[EjercicioMesDia])   -- Fecha seleccionada más alta (texto)

-- Convertir texto a tipo fecha
VAR FechaInicio = DATEVALUE(FechaInicioTexto)
VAR FechaFin = DATEVALUE(FechaFinTexto)

-- Calcular las fechas del rango del año anterior
VAR FechaInicioAnioAnterior = EDATE(FechaInicio, -12)
VAR FechaFinAnioAnterior = EDATE(FechaFin, -12)

-- Calcular las ventas para el rango del año anterior
VAR VentasAnioAnterior =
    CALCULATE(
        [Venta € Abel],
        FILTER(
            ALL('abel_fvent_fech'),
            'abel_fvent_fech'[fecha] >= FechaInicioAnioAnterior &&
            'abel_fvent_fech'[fecha] <= FechaFinAnioAnterior
        )
    )

RETURN
    VentasAnioAnterior



Proyección kg MES. = 
    VAR ProyeccionEur = [Venta kg Abel] / [DiasSeleccionados] * [DiasDelMes]
    RETURN
        ProyeccionEur



Venta € Abel = SUM(abel_fvent_fech[subtotalConRappel])


Presupuesto € AÑO TOP = 

    VAR FechaInicioTexto = MIN(dFechas[EjercicioMesDia]) -- Texto seleccionado más bajo
    VAR FechaFinTexto = MAX(dFechas[EjercicioMesDia])   -- Texto seleccionado más alto

    -- Convertir texto a tipo fecha
    VAR FechaInicio = DATEVALUE(FechaInicioTexto)
    VAR FechaFin = DATEVALUE(FechaFinTexto)

    -- Obtener el presupuesto del mes al que pertenece la fecha más alta seleccionada
    VAR PresupuestoMensual = 
        CALCULATE(
            [Importe presupuesto Abel],
            FILTER(
                ALL(dFechas), 
                dFechas[Date] = EOMONTH(FechaFin, 0) -- Última fecha del mes correspondiente
            )
        )

    -- Calcular el número total de días en el mes correspondiente a la fecha más alta seleccionada
    VAR DiasDelMes = DAY(EOMONTH(FechaFin, 0))

    -- Calcular el número de días seleccionados en el rango
    VAR DiasSeleccionados = DATEDIFF(FechaInicio, FechaFin, DAY) + 1

    -- Calcular el presupuesto proporcional basado en los días seleccionados
    VAR PresupuestoProporcional = (PresupuestoMensual / DiasDelMes) * DiasSeleccionados

    RETURN
        PresupuestoProporcional


Presupuesto KG Mes TOP = 
    VAR FechaInicioTexto = MIN(dFechas[EjercicioMesDia]) -- Texto seleccionado más bajo
    VAR FechaFinTexto = MAX(dFechas[EjercicioMesDia])   -- Texto seleccionado más alto

    -- Convertir texto a tipo fecha
    VAR FechaInicio = DATEVALUE(FechaInicioTexto)
    VAR FechaFin = DATEVALUE(FechaFinTexto)

    -- Obtener el presupuesto del mes al que pertenece la fecha más alta seleccionada
    VAR PresupuestoMensual = 
        CALCULATE(
            [Kg presupuesto Abel],
            FILTER(
                ALL(dFechas), 
                dFechas[Date] = EOMONTH(FechaFin, 0) -- Última fecha del mes correspondiente
            )
        )

    -- Calcular el número total de días en el mes correspondiente a la fecha más alta seleccionada
    VAR DiasDelMes = DAY(EOMONTH(FechaFin, 0))

    -- Calcular el número de días seleccionados en el rango
    VAR DiasSeleccionados = DATEDIFF(FechaInicio, FechaFin, DAY) + 1

    -- Calcular el presupuesto proporcional basado en los días seleccionados
    VAR PresupuestoProporcional = (PresupuestoMensual / DiasDelMes) * DiasSeleccionados

    RETURN
        PresupuestoProporcional


Z Presupuesto kg AÑO TOP = [Z Presupuesto € BOTTOM] / 366 * [DiasSeleccionados]