CREATE SEQUENCE SEQ_CODIGO_USUARIO INCREMENT BY 1 START WITH 1;

CREATE OR REPLACE PROCEDURE P_AGREGAR_USUARIO (
	p_codigo_genero tbl_usuarios.codigo_genero%TYPE,
	p_codigo_lugar tbl_usuarios.codigo_lugar%TYPE,
	p_codigo_tipo tbl_usuarios.codigo_tipo%TYPE,
	p_nombre tbl_usuarios.nombre%TYPE,
	p_usuario tbl_usuarios.usuario%TYPE,
	p_correo tbl_usuarios.correo%TYPE,
	p_contrasenia tbl_usuarios.contrasenia%TYPE,
	p_foto_perfil tbl_usuarios.foto_perfil%TYPE,
	p_espacio_usado tbl_usuarios.espacio_usado%TYPE,
	p_telefono tbl_usuarios.telefono%TYPE,
	p_correo_alterno tbl_usuarios.correo_alterno%TYPE,
	p_fecha_nacimiento VARCHAR2,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_USUARIOS
	WHERE CORREO = p_correo;

	IF (v_cantidad = 0) THEN
		INSERT INTO TBL_USUARIOS (
			CODIGO_USUARIO,
			CODIGO_GENERO,
			CODIGO_LUGAR,
			CODIGO_TIPO,
			NOMBRE,
			USUARIO,
			CORREO,
			CONTRASENIA,
			FOTO_PERFIL,
			ESPACIO_USADO,
			TELEFONO,
			CORREO_ALTERNO,
			FECHA_NACIMIENTO
		) VALUES (
			SEQ_CODIGO_USUARIO.NEXTVAL,
			p_codigo_genero,
			p_codigo_lugar,
			p_codigo_tipo,
			p_nombre,
			p_usuario,
			p_correo,
			p_contrasenia,
			p_foto_perfil,
			p_espacio_usado,
			p_telefono,
			p_correo_alterno,
			TO_DATE(p_fecha_nacimiento,'DD/MM/YYYY')
		);
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'Registro almacenado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'Correo duplicado, no se pudo guardar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;

CREATE OR REPLACE PROCEDURE P_MODIFICAR_USUARIO (
	p_codigo_usuario tbl_usuarios.codigo_usuario%TYPE,
	p_codigo_genero tbl_usuarios.codigo_genero%TYPE,
	p_codigo_lugar tbl_usuarios.codigo_lugar%TYPE,
	p_codigo_tipo tbl_usuarios.codigo_tipo%TYPE,
	p_nombre tbl_usuarios.nombre%TYPE,
	p_contrasenia tbl_usuarios.contrasenia%TYPE,
	p_foto_perfil tbl_usuarios.foto_perfil%TYPE,
	p_telefono tbl_usuarios.telefono%TYPE,
	p_correo_alterno tbl_usuarios.correo_alterno%TYPE,
	p_fecha_nacimiento VARCHAR2,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_USUARIOS
	WHERE CODIGO_USUARIO = p_codigo_usuario;

	IF (v_cantidad > 0) THEN		

		IF (p_codigo_genero IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET CODIGO_GENERO = p_codigo_genero
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;

		IF (p_codigo_lugar IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET CODIGO_LUGAR = p_codigo_lugar
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;

		IF (p_codigo_tipo IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET CODIGO_TIPO = p_codigo_tipo
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;

		IF (p_nombre IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET NOMBRE = p_nombre
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;

		IF (p_contrasenia IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET CONTRASENIA = p_contrasenia
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;

		IF (p_foto_perfil IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET FOTO_PERFIL = p_foto_perfil
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;

		IF (p_telefono IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET TELEFONO = p_telefono
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;

		IF (p_correo_alterno IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET CORREO_ALTERNO = p_correo_alterno
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;

		IF (p_fecha_nacimiento IS NOT NULL) THEN
			UPDATE TBL_USUARIOS
			SET FECHA_NACIMIENTO = p_fecha_nacimiento
			WHERE CODIGO_USUARIO = p_codigo_usuario;
		END IF;	
		
		COMMIT;

		p_codigo_resultado := 1;
		p_mensaje := 'Usuario modificado con exito';
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

CREATE OR REPLACE PROCEDURE P_ELIMINAR_USUARIO (
	p_codigo_usuario tbl_usuarios.codigo_usuario%TYPE,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_USUARIOS
	WHERE CODIGO_USUARIO = p_codigo_usuario;

	IF (v_cantidad > 0) THEN

		DELETE FROM TBL_USUARIOS WHERE CODIGO_USUARIO = p_codigo_usuario;
		
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'Usuario eliminado con exito';
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