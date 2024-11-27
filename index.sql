Presupuesto € Mes BOTTOM = 
-- Obtener la fecha seleccionada (puede ser cualquier fecha del mes seleccionado) }vP5Jfe]%p_mRws
VAR FechaSeleccionadaTexto = MAX(dFechas[EjercicioMesDia]) -- Fecha seleccionada como texto
VAR FechaSeleccionada = DATEVALUE(FechaSeleccionadaTexto) -- Convertir a tipo fecha

-- Obtener el presupuesto asignado a la última fecha del mes correspondiente
VAR PresupuestoMensual = 
    CALCULATE(
        [Importe presupuesto Abel],
        FILTER(
            ALL(dFechas), 
            dFechas[Date] = EOMONTH(FechaSeleccionada, 0) -- Última fecha del mes
        )
    )

RETURN
    PresupuestoMensual



Z Presupuesto kg AÑO TOP = [Z Presupuesto € BOTTOM] / 366 * [DiasSeleccionados]


Imp Pres 2024.
[Importe Vendido
Imp Pres 2024.

Importe presupuesto Abel = CALCULATE([Kg o euros valor Abel], pres2024Abel[Concepto] = "euros")

Imp Pres 2024. = calculate([Importe Presupuestado 2024.], 'outPresupuesto2024-semanas'[concepto] = "IMP 2024")

pres2024Abel

Presupuesto € Abel valor entreFechas = 
    if ([Dias_Mes_O_Ano] = [Dias_Pasados_Mes],
       [Imp Pres 2024.],
       [Imp Pres 2024.] / [Dias_Mes_O_Ano] * ([Dias_Pasados_Mes] - 1))


182204400

   [Kg Pres 2024],