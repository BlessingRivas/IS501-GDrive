ALTER TABLE DRIVE.TBL_ACCIONES DISABLE CONSTRAINT ACC_TIP_ACC_FK;
ALTER TABLE DRIVE.TBL_ACCIONES DISABLE CONSTRAINT ACC_CAR_ORI_FK;
ALTER TABLE DRIVE.TBL_ACCIONES DISABLE CONSTRAINT ACC_CAR_DES_FK;
ALTER TABLE DRIVE.TBL_ACCIONES DISABLE CONSTRAINT ACC_ARC_ORI_FK;
ALTER TABLE DRIVE.TBL_ACCIONES DISABLE CONSTRAINT ACC_ARC_DES_FK;

insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (1, 4, 20, 34, 24, 15, TO_DATE('4/18/2019','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (2, 2, 14, 20, 16, 28, TO_DATE('7/15/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (3, 2, 14, 25, 24, 31, TO_DATE('7/6/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (4, 4, 19, 36, 21, 19, TO_DATE('11/25/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (5, 1, 27, 12, 31, 31, TO_DATE('12/29/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (6, 1, 17, 11, 39, 22, TO_DATE('3/15/2019','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (7, 1, 11, 29, 24, 16, TO_DATE('8/20/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (8, 3, 21, 19, 34, 35, TO_DATE('8/16/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (9, 1, 13, 12, 19, 26, TO_DATE('7/22/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (10, 3, 24, 21, 19, 46, TO_DATE('7/26/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (11, 4, 27, 16, 22, 39, TO_DATE('3/9/2019','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (12, 2, 14, 28, 17, 30, TO_DATE('11/14/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (13, 2, 24, 12, 15, 33, TO_DATE('5/20/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (14, 3, 30, 23, 16, 24, TO_DATE('8/30/2018','mm/dd/yyyy'));
insert into TBL_ACCIONES (codigo_accion, codigo_tipo_accion, codigo_carpeta_origen, codigo_carpeta_destino, codigo_archivo_origen, codigo_archivo_destino, fecha) values (15, 2, 40, 37, 42, 35, TO_DATE('6/18/2018','mm/dd/yyyy'));

ALTER TABLE DRIVE.TBL_ACCIONES ENABLE CONSTRAINT ACC_TIP_ACC_FK;
ALTER TABLE DRIVE.TBL_ACCIONES ENABLE CONSTRAINT ACC_CAR_ORI_FK;
ALTER TABLE DRIVE.TBL_ACCIONES ENABLE CONSTRAINT ACC_CAR_DES_FK;
ALTER TABLE DRIVE.TBL_ACCIONES ENABLE CONSTRAINT ACC_ARC_ORI_FK;
ALTER TABLE DRIVE.TBL_ACCIONES ENABLE CONSTRAINT ACC_ARC_DES_FK;