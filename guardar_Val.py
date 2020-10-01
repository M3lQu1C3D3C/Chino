#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Thu Oct  1 11:45:58 2020

@author: melqi
"""

import pandas as pd 

class Pide_Valores:
    
    def __init__(self, placa, conductor_1):
        self.placa = placa
        self.conductor_1 = conductor_1
        print("************* Placa: %s, Conductor: %s"%(placa, conductor_1))
        return 
    def save(self):
        datos = pd.read_csv("datos_control.csv", index_col="ID")
        filas = datos.index.size
        filas += 1
        