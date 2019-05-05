CREATE SEQUENCE SEQ_CODIGO_CARPETA INCREMENT BY 1 START WITH 1;

CREATE OR REPLACE PROCEDURE P_AGREGAR_CARPETA (	
	p_codigo_usuario tbl_carpetas.codigo_usuario%TYPE,
	p_codigo_carpeta_padre tbl_carpetas.codigo_carpeta_padre%TYPE,
	p_nombre tbl_carpetas.nombre%TYPE,	
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_CARPETAS
	WHERE NOMBRE = p_nombre;

	IF (v_cantidad = 0) THEN
		INSERT INTO TBL_CARPETAS (
			CODIGO_CARPETA,
			CODIGO_USUARIO,
			CODIGO_CARPETA_PADRE,
			NOMBRE,			
			FECHA_CREACION,
			FECHA_MODIFICACION,
			FECHA_ULTIMO_ACCESO,
			ELIMINADO,
			FECHA_ELIMINADO
		) VALUES (
			SEQ_CODIGO_CARPETA.NEXTVAL,			
			p_codigo_usuario,
			p_codigo_carpeta_padre,
			p_nombre,			
			SYSDATE,
			SYSDATE,
			SYSDATE,			
			0,
			NULL
		);
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'Registro almacenado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'Carpeta duplicada, no se pudo guardar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;

CREATE OR REPLACE PROCEDURE P_MODIFICAR_CARPETA (
	p_codigo_carpeta tbl_carpetas.codigo_carpeta%TYPE,
	p_codigo_carpeta_padre tbl_carpetas.codigo_carpeta_padre%TYPE,
	p_nombre tbl_carpetas.nombre%TYPE,
	p_eliminado tbl_carpetas.eliminado%TYPE,	
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_CARPETAS
	WHERE CODIGO_CARPETA = p_codigo_carpeta;

	IF (v_cantidad > 0) THEN

		UPDATE TBL_CARPETAS
		SET FECHA_MODIFICACION = SYSDATE,
			FECHA_ULTIMO_ACCESO = SYSDATE
		WHERE CODIGO_CARPETA = p_codigo_carpeta;		

		IF (p_codigo_carpeta_padre IS NOT NULL) THEN
			UPDATE TBL_CARPETAS
			SET CODIGO_CARPETA_PADRE = p_codigo_carpeta_padre
			WHERE CODIGO_CARPETA = p_codigo_carpeta;
		END IF;

		IF (p_nombre IS NOT NULL) THEN
			UPDATE TBL_CARPETAS
			SET NOMBRE = p_nombre
			WHERE CODIGO_CARPETA = p_codigo_carpeta;
		END IF;

		IF (p_eliminado IS NOT NULL) THEN
			UPDATE TBL_CARPETAS
			SET ELIMINADO = p_eliminado,
				FECHA_ELIMINADO = SYSDATE
			WHERE CODIGO_CARPETA = p_codigo_carpeta;
		END IF;

		
		COMMIT;

		p_codigo_resultado := 1;
		p_mensaje := 'Crpeta modificada con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'No se encontro el usuario, no se pudo eliminar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;


CREATE OR REPLACE PROCEDURE P_ELIMINAR_CARPETA (
	p_codigo_carpeta tbl_carpetas.codigo_carpeta%TYPE,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_CARPETAS
	WHERE CODIGO_CARPETA = p_codigo_carpeta;

	IF (v_cantidad > 0) THEN

		DELETE FROM TBL_ARCHIVOS WHERE CODIGO_CARPETA = p_codigo_carpeta;
		DELETE FROM TBL_CARPETAS WHERE CODIGO_CARPETA = p_codigo_carpeta OR CODIGO_CARPETA_PADRE = p_codigo_carpeta;				
		COMMIT;

		p_codigo_resultado := 1;
		p_mensaje := 'Carpeta eliminada con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'No se encontro la carpeta, no se pudo eliminar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;