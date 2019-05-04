ALTER TABLE DRIVE.TBL_IMAGENES DISABLE CONSTRAINT IMA_ARC_FK;

insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (19, 772, 876);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (23, 1558, 608);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (12, 1019, 981);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (21, 1433, 87);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (20, 1059, 288);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (35, 659, 327);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (30, 997, 310);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (26, 172, 674);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (16, 154, 595);
insert into TBL_IMAGENES (codigo_archivo, ancho, alto) values (40, 325, 83);

ALTER TABLE DRIVE.TBL_IMAGENES ENABLE CONSTRAINT IMA_ARC_FK;