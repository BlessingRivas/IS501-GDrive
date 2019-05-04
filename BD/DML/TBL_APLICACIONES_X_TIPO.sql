ALTER TABLE DRIVE.TBL_APLICACIONES_X_TIPOS DISABLE CONSTRAINT APL_X_TIP_TIP_ARC_FK;
ALTER TABLE DRIVE.TBL_APLICACIONES_X_TIPOS DISABLE CONSTRAINT APL_X_TIP_APL_TER_FK;

insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (6, 3);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (5, 8);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (8, 9);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (3, 10);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (7, 9);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (6, 9);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (1, 2);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (3, 1);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (2, 8);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (1, 6);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (4, 8);
insert into TBL_APLICACIONES_X_TIPOS (codigo_tipo_archivo, codigo_aplicacion) values (3, 2);

ALTER TABLE DRIVE.TBL_APLICACIONES_X_TIPOS ENABLE CONSTRAINT APL_X_TIP_TIP_ARC_FK;
ALTER TABLE DRIVE.TBL_APLICACIONES_X_TIPOS ENABLE CONSTRAINT APL_X_TIP_APL_TER_FK;