CREATE SEQUENCE SEQ_CODIGO_ARCHIVO INCREMENT BY 1 START WITH 1;

CREATE OR REPLACE PROCEDURE P_AGREGAR_ARCHIVO (
	p_codigo_usuario tbl_archivos.codigo_usuario%TYPE,
	p_codigo_carpeta tbl_archivos.codigo_carpeta%TYPE,
	p_codigo_unidad tbl_archivos.codigo_unidad%TYPE,
	p_codigo_tipo_archivo tbl_archivos.codigo_tipo_archivo%TYPE,
	p_nombre tbl_archivos.nombre%TYPE,
	p_tamanio tbl_archivos.tamanio%TYPE,
	p_archivo tbl_archivos.archivo%TYPE,
	p_descripcion tbl_archivos.descripcion%TYPE,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_ARCHIVOS
	WHERE NOMBRE = p_nombre;

	IF (v_cantidad = 0) THEN
		INSERT INTO TBL_ARCHIVOS (
			CODIGO_ARCHIVO,
			CODIGO_USUARIO,
			CODIGO_CARPETA,
			CODIGO_UNIDAD,
			CODIGO_TIPO_ARCHIVO,
			NOMBRE,
			TAMANIO,
			FECHA_SUBIDA,
			FECHA_MODIFICACION,
			FECHA_ULTIMO_ACCESO,
			ARCHIVO,
			DESCRIPCION,
			ELIMINADO,
			FECHA_ELIMINADO
		) VALUES (
			SEQ_CODIGO_ARCHIVO.NEXTVAL,
			p_codigo_usuario,
			p_codigo_carpeta,
			p_codigo_unidad,
			p_codigo_tipo_archivo,
			p_nombre,
			p_tamanio,
			SYSDATE,
			SYSDATE,
			SYSDATE,
			p_archivo,
			p_descripcion,
			0,
			NULL
		);
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'Registro almacenado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'Archivo duplicado, no se pudo guardar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;

CREATE OR REPLACE PROCEDURE P_MODIFICAR_ARCHIVO (
	p_codigo_archivo tbl_archivos.codigo_archivo%TYPE,
	p_codigo_carpeta tbl_archivos.codigo_carpeta%TYPE,	
	p_nombre tbl_archivos.nombre%TYPE,
	p_descripcion tbl_archivos.descripcion%TYPE,
	p_eliminado tbl_archivos.eliminado%TYPE,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;

BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_ARCHIVOS
	WHERE CODIGO_ARCHIVO = p_codigo_archivo;

	IF (v_cantidad > 0) THEN

		UPDATE TBL_ARCHIVOS
		SET FECHA_MODIFICACION = SYSDATE,
			FECHA_ULTIMO_ACCESO = SYSDATE
		WHERE CODIGO_ARCHIVO = p_codigo_archivo;

		IF (p_codigo_carpeta IS NOT NULL) THEN
			UPDATE TBL_ARCHIVOS
			SET CODIGO_CARPETA = p_codigo_carpeta
			WHERE CODIGO_ARCHIVO = p_codigo_archivo;
		END IF;		

		IF (p_nombre IS NOT NULL) THEN
			UPDATE TBL_ARCHIVOS
			SET NOMBRE = p_nombre
			WHERE CODIGO_ARCHIVO = p_codigo_archivo;
		END IF;

		IF (p_descripcion IS NOT NULL) THEN
			UPDATE TBL_ARCHIVOS
			SET DESCRIPCION = p_descripcion
			WHERE CODIGO_ARCHIVO = p_codigo_archivo;
		END IF;

		IF (p_eliminado IS NOT NULL) THEN
			UPDATE TBL_ARCHIVOS
			SET ELIMINADO = p_eliminado,
				FECHA_ELIMINADO = SYSDATE
			WHERE CODIGO_ARCHIVO = p_codigo_archivo;
		END IF;			
		
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'ArchiVo modificado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'No se encontro el archivo, no se pudo guardar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;

CREATE OR REPLACE PROCEDURE P_ELIMINAR_ARCHIVO (
	p_codigo_archivo tbl_archivos.codigo_archivo%TYPE,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_ARCHIVOS
	WHERE CODIGO_ARCHIVO = p_codigo_archivo;

	IF (v_cantidad > 0) THEN

		DELETE FROM TBL_ARCHIVOS WHERE CODIGO_ARCHIVO = p_codigo_archivo;
		
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'Registro eliminado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'No se encontro el archivo, no se pudo eliminar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;