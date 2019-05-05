ALTER TABLE DRIVE.TBL_COPIAS_DE_SEGURIDAD DISABLE CONSTRAINT COP_DE_SEG_USU_FK;

insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (1, 37, TO_DATE('3/1/2019','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (2, 16, TO_DATE('8/11/2018','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (3, 33, TO_DATE('11/8/2018','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (4, 29, TO_DATE('1/18/2019','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (5, 29, TO_DATE('8/20/2018','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (6, 22, TO_DATE('9/8/2018','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (7, 6, TO_DATE('9/25/2018','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (8, 3, TO_DATE('7/22/2018','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (9, 5, TO_DATE('3/10/2019','mm/dd/yyyy'),'generic-backup.zip');
insert into TBL_COPIAS_DE_SEGURIDAD (codigo_copia_seguridad, codigo_usuario, fecha_hora_copia, archivo_copia) values (10, 48, TO_DATE('4/8/2019','mm/dd/yyyy'),'generic-backup.zip');

ALTER TABLE DRIVE.TBL_COPIAS_DE_SEGURIDAD DISABLE CONSTRAINT COP_DE_SEG_USU_FK;