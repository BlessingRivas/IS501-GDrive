ALTER TABLE DRIVE.TBL_SISTEMAS_OPERATIVOS DISABLE CONSTRAINT SIS_OPE_VER_FK;

insert into TBL_SISTEMAS_OPERATIVOS (CODIGO_SISTEMA, CODIGO_VERSION, NOMBRE_SISTEMA) values (1, 1, 'LINUX');
insert into TBL_SISTEMAS_OPERATIVOS (CODIGO_SISTEMA, CODIGO_VERSION, NOMBRE_SISTEMA) values (2, 2, 'LINUX');
insert into TBL_SISTEMAS_OPERATIVOS (CODIGO_SISTEMA, CODIGO_VERSION, NOMBRE_SISTEMA) values (3, 3, 'WINDOWS');
insert into TBL_SISTEMAS_OPERATIVOS (CODIGO_SISTEMA, CODIGO_VERSION, NOMBRE_SISTEMA) values (4, 4, 'WINDOWS');

ALTER TABLE DRIVE.TBL_SISTEMAS_OPERATIVOS ENABLE CONSTRAINT SIS_OPE_VER_FK;