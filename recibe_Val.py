#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Thu Oct  1 12:03:42 2020

@author: melqi
"""
from guardar_Val import Pide_Valores

placa = input("Placa: ")
conductor_1 = input("Conductor_1: ")
#item_in = input("Item: ")
#fecha_in = input("Fecha: ")
#manten_in = input("Tipo de Mantenimiento: ")
#mecanico_in = input("Nombre de Mecánico: ")
#lugar_in = input("Lugar: ")
#repuesto_in = input("Repuesto: ")
#recorrido_in = input("Recorrido: ")
#conductor_2_in = input("Conductor_2: ")
#VB_supervisor_in = input("VB Supervisor: ")

control = Pide_Valores(placa, conductor_1)
control.save()