ALTER TABLE DRIVE.TBL_DESTACADOS DISABLE CONSTRAINT DES_ARC_FK;
ALTER TABLE DRIVE.TBL_DESTACADOS DISABLE CONSTRAINT DES_CAR_FK;

insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (27, NULL, TO_DATE('7/9/2018','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (NULL, 15, TO_DATE('9/23/2018','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (26, NULL, TO_DATE('9/11/2018','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (NULL, 25, TO_DATE('11/22/2018','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (22, NULL, TO_DATE('8/13/2018','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (NULL, 29, TO_DATE('3/24/2019','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (17, NULL, TO_DATE('10/11/2018','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (NULL, 38, TO_DATE('4/29/2019','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (32, NULL, TO_DATE('2/6/2019','mm/dd/yyyy'));
insert into TBL_DESTACADOS (codigo_carpeta, codigo_archivo, fecha_destacado) values (NULL, 35, TO_DATE('8/12/2018','mm/dd/yyyy'));

ALTER TABLE DRIVE.TBL_DESTACADOS ENABLE CONSTRAINT DES_ARC_FK;
ALTER TABLE DRIVE.TBL_DESTACADOS ENABLE CONSTRAINT DES_CAR_FK;