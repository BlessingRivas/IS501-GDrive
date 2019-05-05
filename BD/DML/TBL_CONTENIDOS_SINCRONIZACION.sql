ALTER TABLE DRIVE.TBL_CONTENIDOS_SINCRONIZACION DISABLE CONSTRAINT CON_SIN_CAR_FK;
ALTER TABLE DRIVE.TBL_CONTENIDOS_SINCRONIZACION DISABLE CONSTRAINT CON_SIN_ARC_FK;
ALTER TABLE DRIVE.TBL_CONTENIDOS_SINCRONIZACION DISABLE CONSTRAINT CON_SIN_ORD_FK;

insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (1, 13, 15, 16, TO_DATE('7/1/2018','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (2, 8, 14, 13, TO_DATE('10/17/2018','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (3, 31, 27, 11, TO_DATE('2/25/2019','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (4, 21, 13, 12, TO_DATE('8/3/2018','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (5, 37, 29, 23, TO_DATE('5/31/2018','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (6, 47, 20, 30, TO_DATE('3/6/2019','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (7, 23, 39, 13, TO_DATE('1/19/2019','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (8, 15, 30, 25, TO_DATE('8/14/2018','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (9, 10, 27, 17, TO_DATE('9/8/2018','mm/dd/yyyy'));
insert into TBL_CONTENIDOS_SINCRONIZACION (codigo_sincronizacion, codigo_ordenador, codigo_carpeta, codigo_archivo, fecha_sincronizacion) values (10, 6, 28, 14, TO_DATE('8/18/2018','mm/dd/yyyy'));

ALTER TABLE DRIVE.TBL_CONTENIDOS_SINCRONIZACION ENABLE CONSTRAINT CON_SIN_CAR_FK;
ALTER TABLE DRIVE.TBL_CONTENIDOS_SINCRONIZACION ENABLE CONSTRAINT CON_SIN_ARC_FK;
ALTER TABLE DRIVE.TBL_CONTENIDOS_SINCRONIZACION ENABLE CONSTRAINT CON_SIN_ORD_FK;