ALTER TABLE DRIVE.TBL_VIDEOS DISABLE CONSTRAINT VID_ARC_FK;

insert into TBL_VIDEOS (codigo_archivo, ancho, alto, duracion) values (43, 1641, 116, 3149371);
insert into TBL_VIDEOS (codigo_archivo, ancho, alto, duracion) values (23, 222, 275, 4459213);
insert into TBL_VIDEOS (codigo_archivo, ancho, alto, duracion) values (26, 1550, 280, 8273690);
insert into TBL_VIDEOS (codigo_archivo, ancho, alto, duracion) values (15, 1377, 222, 8903992);
insert into TBL_VIDEOS (codigo_archivo, ancho, alto, duracion) values (47, 200, 784, 8757594);

ALTER TABLE DRIVE.TBL_VIDEOS ENABLE CONSTRAINT VID_ARC_FK;