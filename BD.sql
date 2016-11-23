DECLARE @dbName NVARCHAR(128)
SET @dbName = N'DiagnosticoExpertoBD'

IF (NOT EXISTS (SELECT Name FROM master.dbo.sysdatabases WHERE ('[' + name + ']' = @dbname OR name = @dbname)))
BEGIN
	CREATE DATABASE DiagnosticoExpertoBD
END

GO

USE DiagnosticoExpertoBD
GO
--ELIMINAR SP

IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaGetAll]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaGetAll]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaGetById]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaGetById]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaUpdate]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaUpdate]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaDelete]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaDelete]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaInsert]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaInsert]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaGetAllFilter]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaGetAllFilter]
GO

IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[EnfermedadUpdate]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[EnfermedadUpdate]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[EnfermedadInsert]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[EnfermedadInsert]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[EnfermedadGetById]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[EnfermedadGetById]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[EnfermedadGetAllFilter]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[EnfermedadGetAllFilter]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[EnfermedadGetAll]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[EnfermedadGetAll]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[EnfermedadDelete]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[EnfermedadDelete]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[UsuarioUpdate]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[UsuarioUpdate]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[UsuarioDelete]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[UsuarioDelete]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[UsuarioInsert]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[UsuarioInsert]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[UsuarioGetById]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[UsuarioGetById]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[UsuarioGetAllFilter]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[UsuarioGetAllFilter]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[RolGetById]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[RolGetById]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[RolGetAllFilter]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[RolGetAllFilter]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[InsertLog]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[InsertLog]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaGetFirstPrincipal]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaGetFirstPrincipal]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaGetNextPrincipalByEnfermedadId]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaGetNextPrincipalByEnfermedadId]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[SintomaGetNext]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[SintomaGetNext]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[UsuarioGetByUsername]') AND type in (N'P', N'PC'))
DROP PROCEDURE [DiagnosticoExperto].[UsuarioGetByUsername]
GO
--ELIMINAR TABLAS
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[Log]') AND type in (N'U'))
DROP TABLE [DiagnosticoExperto].[Log]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[Usuario]') AND type in (N'U'))
DROP TABLE [DiagnosticoExperto].[Usuario]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[Rol]') AND type in (N'U'))
DROP TABLE [DiagnosticoExperto].[Rol]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[Sintoma]') AND type in (N'U'))
DROP TABLE [DiagnosticoExperto].[Sintoma]
GO
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[DiagnosticoExperto].[Enfermedad]') AND type in (N'U'))
DROP TABLE [DiagnosticoExperto].[Enfermedad]
GO
IF  EXISTS (SELECT * FROM sys.schemas WHERE name = N'DiagnosticoExperto')
DROP SCHEMA [DiagnosticoExperto]
GO
--CREAR ESQUEMA
CREATE SCHEMA DiagnosticoExperto
GO
--CREAR TABLAS
CREATE TABLE [DiagnosticoExperto].[Log](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Usuario] [varchar](100) NOT NULL,
	[Mensaje] [varchar](4000) NOT NULL,
	[Controlador] [varchar](200) NOT NULL,
	[Accion] [varchar](100) NULL,
	[FechaRegistro] [datetime] NOT NULL,
	[Objeto] [varchar](4000) NOT NULL,
	[Identificador] [int] NULL,
 CONSTRAINT [PK_Log] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [DiagnosticoExperto].[Usuario](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Username] [varchar](100) NOT NULL,
	[Nombre] [varchar](100) NOT NULL,
	[Apellido] [varchar](100) NOT NULL,
	[Correo] [varchar](100) NOT NULL,
	[RolId] [int] NOT NULL,
	[Estado] [int] NOT NULL,
	[UsuarioCreacion] [varchar](100) NOT NULL,
	[UsuarioModificacion] [varchar](100) NULL,
	[FechaHoraCreacion] [datetime] NOT NULL,
	[FechaHoraModificacion] [datetime] NULL,
 CONSTRAINT [PK_Usuario] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [DiagnosticoExperto].[Rol](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [varchar](100) NOT NULL,
	[Descripcion] [varchar](200) NULL,
	[Estado] [int] NOT NULL,
 CONSTRAINT [PK_Rol] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [DiagnosticoExperto].[Enfermedad](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [varchar](100) NOT NULL,
	[Descripcion] [varchar](200) NULL,
	[Estado] [int] NOT NULL,
	[UsuarioCreacion] [varchar](100) NOT NULL,
	[UsuarioModificacion] [varchar](100) NULL,
	[FechaHoraCreacion] [datetime] NOT NULL,
	[FechaHoraModificacion] [datetime] NULL,	
 CONSTRAINT [PK_Enfermedad] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [DiagnosticoExperto].[Sintoma](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [varchar](100) NOT NULL,
	[Pregunta] [varchar](200) NOT NULL,
	[EsPrincipal] [int] NOT NULL,
	[EnfermedadId] [int] NOT NULL,
	[Estado] [int] NOT NULL,
	[UsuarioCreacion] [varchar](100) NOT NULL,
	[UsuarioModificacion] [varchar](100) NULL,
	[FechaHoraCreacion] [datetime] NOT NULL,
	[FechaHoraModificacion] [datetime] NULL,	
 CONSTRAINT [PK_Carga] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [DiagnosticoExperto].[Sintoma]  WITH CHECK ADD  CONSTRAINT [FK_Sintoma_Enfermedad] FOREIGN KEY([EnfermedadId])
REFERENCES [DiagnosticoExperto].[Enfermedad] ([Id])
GO

ALTER TABLE [DiagnosticoExperto].[Sintoma] CHECK CONSTRAINT [FK_Sintoma_Enfermedad]
GO

ALTER TABLE [DiagnosticoExperto].[Usuario]  WITH CHECK ADD  CONSTRAINT [FK_Usuario_Rol] FOREIGN KEY([RolId])
REFERENCES [DiagnosticoExperto].[Rol] ([Id])
GO

ALTER TABLE [DiagnosticoExperto].[Usuario] CHECK CONSTRAINT [FK_Usuario_Rol]
GO

-----------------------------------------------------------------------------------
-----------------------------------------------------------------------------------
-----------------------------------------------------------------------------------

INSERT INTO [DiagnosticoExperto].[Rol] VALUES('Administrador','',1)
INSERT INTO [DiagnosticoExperto].[Rol] VALUES('Usuario','',1)
INSERT INTO [DiagnosticoExperto].[Rol] VALUES('Anonimo','',1)
GO
INSERT INTO [DiagnosticoExperto].[Usuario] VALUES('ADMIN', 'ADMIN', 'ADMIN', 'mijailstell@gmail.com',1,1,'ADMIN',NULL,GETDATE(),NULL)
GO
INSERT [DiagnosticoExperto].[Enfermedad] VALUES (N'Neumonía', N'Neumonía', 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Enfermedad] VALUES (N'Gripe', N'Gripe', 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Enfermedad] VALUES (N'Tos', N'Tos', 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Enfermedad] VALUES (N'Sinositis', N'Sinositis', 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Enfermedad] VALUES (N'Alergias', N'Alergias', 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Enfermedad] VALUES (N'Desconocido', N'Desconocido', 1,'ADMIN',NULL,GETDATE(),NULL)
GO

INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Catarro', N'¿Tiene catarro?', 1, 1, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Nivel de fiebre', N'¿Tiene altos niveles de fiebre prolongada (+3 días)?', 0, 1, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Frecuencia respiratoria', N'¿Tiene frecuencia respiratoria aumentada (+20 días)?', 0, 1, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Actividad de costillas', N'¿Se le produce un hundimiento o retracción de las costillas con la respiración?', 0, 1, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Quejido asmático', N'¿Tiene quejidos en el pecho como asmático al respirar?', 0, 1, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Expectoración', N'¿Tiene tos que produce una expectoración de tipo amarillenta?', 0, 1, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Estornudo', N'¿Tiene estornudadera?', 1, 2, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Escalofríos', N'¿Tiene altos niveles de fibre con escalofríos?', 0, 2, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES (N'Actividad fosas nasales', N'¿Las fosas nasales se abren y se cierran como un aleteo rápido con la respiración?', 0, 2, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Malestar cuerpo', N'¿Tiene decaimiento y malestar al cuerpo?', 0, 2, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Mucosidad', N'¿Tiene mucosidad transparantecontiua?', 0, 2, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Inflamación', N'¿Tiene inflamacion de la fosas nasales con sensación de sequedad en la garganta?', 0, 2, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Cefalea', N'¿Tiene cefalea fija (Dolor de Cabeza), no pulsátil, que es consecuencia de la fiebre?', 0, 2, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Tos', N'¿Toce con frecuencia?', 1, 3, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Espectoración', N'¿Tiene tos que produce una expectoración de tipo amarillenta o verdosa?', 0, 3, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Malestar de cuerpo', N'¿Tiene decaimiento y malestar al cuerpo?', 0, 3, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Inflamación a las amigdalas', N'¿Tiene inflamacion de las admigdalas?', 0, 3, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Inflamación de fosas nasales', N'¿Tiene inflamacion de la fosas nasales?', 0, 3, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Deshidatación', N'¿Siente que esta deshidratado/a?', 0, 3, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Picazón', N'''¿Tiene picazon en el interior de las fosas nasales?', 1, 4, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Estornudo', N'¿Tiene estornudadera?', 0, 4, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Actividad fosas nasales', N'¿Las fosas nasales se abren y se cierran como un aleteo rápido con la respiración?', 0, 4, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Secreción retronasal', N'¿Tiene secreción retronasal?', 0, 4, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Inflamción fosas nasales', N'¿Tiene inflamacion de la fosas nasales?', 0, 4, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Cefalea grave', N'¿Tiene cefalea grave (Dolor de Cabeza)?', 0, 4, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Malestar cuerpo', N'¿Tiene decaimiento y malestar al cuerpo?', 0, 4, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Goteo de nariz', N'¿Tiene congestión o goteo de la nariz con estornudos(particularmente en la mañana)', 1, 5, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Lagrimeo de ojos', N'¿Tiene picazón y lagrimeo de los ojos?', 0, 5, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Tos seca', N'¿Tiene Tos seca?', 0, 5, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Silbido al respirar', N'¿Tiene silbido al respirar?', 0, 5, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Mucosidad', N'¿Tiene mucosidad transparante continua?', 0, 5, 1,'ADMIN',NULL,GETDATE(),NULL)
INSERT [DiagnosticoExperto].[Sintoma] VALUES ( N'Enrojecimiento de piel', N'¿Tiene enrojecimiento de la piel?', 0, 5, 1,'ADMIN',NULL,GETDATE(),NULL)
GO

-------------------------------CREACIÓN DE SP-------------------------------

-- =====================================================
-- Author:  MC
-- Create date: 21/11/2016
-- Description: Listar Usuario por username
-- Test: exec [DiagnosticoExperto].[UsuarioGetByUsername] @Username = ''
-- =====================================================
CREATE PROCEDURE [DiagnosticoExperto].[UsuarioGetByUsername]
@Username VARCHAR(100)
AS
BEGIN
SET NOCOUNT ON;
	SELECT 
	U.Id,
	U.Username,
	U.RolId,
	U.Estado
	FROM
	Usuario U
	WHERE
	U.Username = @Username
	AND U.Estado = 1

END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016     
-- Description: Obtener Rol por Id
-- Test : [DiagnosticoExperto].[RolGetById] 1
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[RolGetById]
@Id INT
AS
BEGIN

	SET NOCOUNT ON;
	SELECT 
	Id,
	Nombre,
	Descripcion,
	Estado
	FROM [DiagnosticoExperto].[Rol]
	WHERE Id = @Id;	
END
GO

-- =====================================================
-- Author:  MC
-- Create date: 21/11/2016
-- Description: Listar Enfermedad
-- Test: EXEC [DiagnosticoExperto].[EnfermedadGetAllFilter] @WhereFilters = '', @OrderBy = '', @Rows = 10
-- =====================================================
CREATE PROCEDURE [DiagnosticoExperto].[EnfermedadGetAllFilter]
@WhereFilters VARCHAR(MAX) = '',
@OrderBy VARCHAR (100) = '', 
@Start INT = 0,
@Rows INT = 0
AS
BEGIN
SET NOCOUNT ON;
    DECLARE @SentenciaSQL nvarchar(3072)
	SET @SentenciaSQL =  '

	;WITH Consulta AS (
	SELECT
		Id
		,Nombre
		,Descripcion
		,Estado
	FROM DiagnosticoExperto.Enfermedad ' + 
	@WhereFilters + 
	') SELECT *
	FROM Consulta
	CROSS JOIN (SELECT Count(*) AS Cantidad FROM Consulta) AS CC
	ORDER BY ' +
	CASE WHEN ISNULL(@OrderBy,'') != '' THEN (@OrderBy) 
	ELSE ' ID ASC ' END
	    + ' ' +
	' OFFSET ' + CONVERT(VARCHAR, (@Start)) + 
	' ROWS FETCH NEXT ' + CONVERT(VARCHAR, @Rows) + ' ROWS ONLY'
	PRINT (@SentenciaSQL);
    EXECUTE sp_executesql  @stmt = @SentenciaSQL

END
GO

-- =====================================================
-- Author:  MC
-- Create date: 21/11/2016
-- Description: Listar Enfermedad
-- Test: EXEC [DiagnosticoExperto].[EnfermedadGetAll] @WhereFilters = ''
-- =====================================================
CREATE PROCEDURE [DiagnosticoExperto].[EnfermedadGetAll]
@WhereFilters VARCHAR(MAX) = ''
AS
BEGIN
SET NOCOUNT ON;
    DECLARE @SentenciaSQL nvarchar(3072)
	SET @SentenciaSQL =  '

	;WITH Consulta AS (
	SELECT
		Id
		,Nombre
		,Descripcion
		,Estado
	FROM DiagnosticoExperto.Enfermedad ' + 
	@WhereFilters + 
	') SELECT *
	FROM Consulta '	
	PRINT (@SentenciaSQL);
    EXECUTE sp_executesql  @stmt = @SentenciaSQL

END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016     
-- Description: Insertar log
-- Test : [DiagnosticoExperto].[InsertLog] '','','','','',0
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[InsertLog]
@Usuario VARCHAR(100),
@Mensaje VARCHAR(4000),
@Controlador VARCHAR(200),
@Accion VARCHAR(100), 
@Objeto VARCHAR(4000),
@Identificador INT
AS
BEGIN
	INSERT INTO [DiagnosticoExperto].[Log](Usuario, Mensaje, Controlador, Accion, FechaRegistro, Objeto, Identificador)
    VALUES(@Usuario, @Mensaje, @Controlador, @Accion, GETDATE(), @Objeto, @Identificador);
END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016 
-- Description: Insertar Enfermedad
-- Test : [DiagnosticoExperto].[EnfermedadInsert] 'Retail Contable','',1,'ADMIN'
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[EnfermedadInsert]
@Nombre VARCHAR(100),
@Descripcion VARCHAR(200),
@Estado INT,
@UsuarioCreacion VARCHAR(100)
AS
BEGIN

	SET NOCOUNT ON;
	INSERT INTO [DiagnosticoExperto].[Enfermedad](Nombre, Descripcion, Estado, UsuarioCreacion, UsuarioModificacion, FechaHoraCreacion, FechaHoraModificacion)
    VALUES(@Nombre, @Descripcion, @Estado, @UsuarioCreacion, NULL, GETDATE(), NULL);

	SELECT @@IDENTITY as Id;	
END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016     
-- Description: Eliminar Enfermedad
-- Test : [DiagnosticoExperto].[EnfermedadDelete] 1
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[EnfermedadDelete]
@Id INT
AS
BEGIN

	SET NOCOUNT ON;
	DECLARE @FILASAFECTADA INT = 0;
	IF  NOT EXISTS (SELECT Id FROM [DiagnosticoExperto].[Sintoma] WHERE EnfermedadId = @Id)
	BEGIN
		UPDATE [DiagnosticoExperto].[Enfermedad] 
		SET Estado = 0
		WHERE Id = @Id;

		SET @FILASAFECTADA = @Id;
	END

	SELECT @FILASAFECTADA AS Id;
END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016        
-- Description: Actualizar Enfermedad
-- Test : [DiagnosticoExperto].[EnfermedadUpdate] 'Sinositis','Descripción Sinositis',1,'ADMIN', 1
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[EnfermedadUpdate]
@Nombre VARCHAR(100),
@Descripcion VARCHAR(200),
@Estado INT,
@UsuarioModificacion VARCHAR(100),
@Id INT
AS
BEGIN

	SET NOCOUNT ON;
	DECLARE @FILASAFECTADA INT = 0;
	IF EXISTS (SELECT Id FROM [DiagnosticoExperto].[Enfermedad] WHERE Id = @Id)
	BEGIN
		UPDATE [DiagnosticoExperto].[Enfermedad] 
		SET Nombre = @Nombre,
		Descripcion = @Descripcion,
		Estado = @Estado,
		UsuarioModificacion = @UsuarioModificacion,
		FechaHoraModificacion = GETDATE()
		WHERE Id = @Id;

		SET @FILASAFECTADA = @Id;
	END

	SELECT @FILASAFECTADA AS Id;
END
GO


-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016          
-- Description: Obtener Enfermedad por Id
-- Test : [DiagnosticoExperto].[EnfermedadGetById] 1
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[EnfermedadGetById]
@Id INT
AS
BEGIN

	SET NOCOUNT ON;
	SELECT 
	Id,
	Nombre,
	Descripcion,
	Estado
	FROM [DiagnosticoExperto].[Enfermedad]
	WHERE Id = @Id;	
END
GO

-- =====================================================
-- Author:  MC
-- Create date: 21/11/2016
-- Description: Obtener primer síntoma principal
-- Test: EXEC [DiagnosticoExperto].[SintomaGetFirstPrincipal]
-- =====================================================
CREATE PROCEDURE [DiagnosticoExperto].[SintomaGetFirstPrincipal]
AS
BEGIN
SET NOCOUNT ON;

	DECLARE @FirstEnfermedad INT = (
		SELECT TOP(1) E.Id 
		FROM DiagnosticoExperto.Enfermedad E
		WHERE E.Estado = 1
		ORDER BY 1 ASC
	)
	SELECT 
	TOP(1)
	S.Id,
	S.Nombre,
	S.Pregunta,
	S.EsPrincipal,
	S.Estado,
	S.EnfermedadId,
	E.Nombre EnfermedadNombre
	FROM
	DiagnosticoExperto.Sintoma S 
	INNER JOIN DiagnosticoExperto.Enfermedad E
	ON S.EnfermedadId = E.Id
	WHERE
	S.EnfermedadId = @FirstEnfermedad
	AND S.Estado = 1
END
GO

-- =====================================================
-- Author:  MC
-- Create date: 21/11/2016
-- Description: Obtener síntoma principal por enfermedad
-- Test: EXEC [DiagnosticoExperto].[SintomaGetNextPrincipalByEnfermedadId] @EnfermedadId = 1
-- =====================================================
CREATE PROCEDURE [DiagnosticoExperto].[SintomaGetNextPrincipalByEnfermedadId]
@EnfermedadId INT
AS
BEGIN
SET NOCOUNT ON;

	SELECT 
	TOP(1)
	S.Id,
	S.Nombre,
	S.Pregunta,
	S.EsPrincipal,
	S.Estado,
	S.EnfermedadId,
	E.Nombre EnfermedadNombre
	FROM
	DiagnosticoExperto.Sintoma S 
	INNER JOIN DiagnosticoExperto.Enfermedad E
	ON S.EnfermedadId = E.Id
	WHERE
	S.EnfermedadId > @EnfermedadId
	AND S.Estado = 1
END
GO

-- =====================================================
-- Author:  MC
-- Create date: 21/11/2016
-- Description: Obtener el siguiente sintoma
-- Test: EXEC [DiagnosticoExperto].[SintomaGetNext] @EnfermedadId = 1, @Next = 1
-- =====================================================
CREATE PROCEDURE [DiagnosticoExperto].[SintomaGetNext]
@EnfermedadId INT,
@Next INT
AS
BEGIN
SET NOCOUNT ON;
	SELECT 
	TOP(1)
	S.Id,
	S.Nombre,
	S.Pregunta,
	S.EsPrincipal,
	S.Estado,
	S.EnfermedadId,
	E.Nombre EnfermedadNombre
	FROM
	DiagnosticoExperto.Sintoma S 
	INNER JOIN DiagnosticoExperto.Enfermedad E
	ON S.EnfermedadId = E.Id
	WHERE
	S.EnfermedadId = @EnfermedadId
	AND S.Id > @Next
	AND S.Estado = 1
END
GO

-- =====================================================
-- Author:  MC
-- Create date: 21/11/2016
-- Description: Listar Sintoma
-- Test: EXEC [DiagnosticoExperto].[SintomaGetAll] @WhereFilters = ''
-- =====================================================
CREATE PROCEDURE [DiagnosticoExperto].[SintomaGetAll]
@WhereFilters VARCHAR(MAX) = ''
AS
BEGIN
SET NOCOUNT ON;
    DECLARE @SentenciaSQL nvarchar(3072)
	SET @SentenciaSQL =  '

	;WITH Consulta AS (
	SELECT
		Id
		,EnfermedadId
		,Nombre
		,Pregunta
		,EsPrincipal
		,Estado
	FROM DiagnosticoExperto.Sintoma ' + 
	@WhereFilters + 
	') SELECT *
	FROM Consulta '	
	PRINT (@SentenciaSQL);
    EXECUTE sp_executesql  @stmt = @SentenciaSQL

END
GO

-- =====================================================
-- Author:  MC
-- Create date: 21/11/2016
-- Description: Listar Sintoma
-- Test: EXEC [DiagnosticoExperto].[SintomaGetAllFilter] @WhereFilters = '', @OrderBy = '', @Rows = 10
-- =====================================================
CREATE PROCEDURE [DiagnosticoExperto].[SintomaGetAllFilter]
@WhereFilters VARCHAR(MAX) = '',
@OrderBy VARCHAR (100) = '', 
@Start INT = 0,
@Rows INT = 0
AS
BEGIN
SET NOCOUNT ON;
    DECLARE @SentenciaSQL nvarchar(3072)
	SET @SentenciaSQL =  '

	;WITH Consulta AS (
	SELECT
		V.Id		
		,V.Nombre
		,V.Pregunta
		,V.EsPrincipal
		,V.EnfermedadId
		,T.Nombre EnfermedadNombre
		,V.Estado
	FROM DiagnosticoExperto.Sintoma V 
	INNER JOIN DiagnosticoExperto.Enfermedad T 
	ON V.EnfermedadId = T.Id ' + 
	@WhereFilters + 
	') SELECT *
	FROM Consulta
	CROSS JOIN (SELECT Count(*) AS Cantidad FROM Consulta) AS CC
	ORDER BY ' +
	CASE WHEN ISNULL(@OrderBy,'') != '' THEN (@OrderBy) 
	ELSE ' ID ASC ' END
	    + ' ' +
	' OFFSET ' + CONVERT(VARCHAR, (@Start)) + 
	' ROWS FETCH NEXT ' + CONVERT(VARCHAR, @Rows) + ' ROWS ONLY'
	PRINT (@SentenciaSQL);
    EXECUTE sp_executesql  @stmt = @SentenciaSQL

END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016     
-- Description: Insertar Sintoma
-- Test : [DiagnosticoExperto].[SintomaInsert] 1,'Sinositis','¿Tiene sinositis?',1,1,'ADMIN'
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[SintomaInsert]
@EnfermedadId INT,
@Nombre VARCHAR(100),
@Pregunta VARCHAR(200),
@EsPrincipal INT,
@Estado INT,
@UsuarioCreacion VARCHAR(100)
AS
BEGIN

	SET NOCOUNT ON;
	INSERT INTO [DiagnosticoExperto].[Sintoma](EnfermedadId, Nombre, Pregunta, EsPrincipal, Estado, UsuarioCreacion, UsuarioModificacion, FechaHoraCreacion, FechaHoraModificacion)
    VALUES(@EnfermedadId, @Nombre, @Pregunta, @EsPrincipal, @Estado, @UsuarioCreacion, NULL, GETDATE(), NULL);

	SELECT @@IDENTITY as Id;	
END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016     
-- Description: Eliminar Sintoma
-- Test : [DiagnosticoExperto].[SintomaDelete] 33
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[SintomaDelete]
@Id INT
AS
BEGIN

	SET NOCOUNT ON;
	DECLARE @FILASAFECTADA INT = 0;

	UPDATE [DiagnosticoExperto].[Sintoma] 
	SET Estado = 0
	WHERE Id = @Id;

	SET @FILASAFECTADA = @Id;

	SELECT @FILASAFECTADA AS Id;
END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016     
-- Description: Actualizar Sintoma
-- Test : [DiagnosticoExperto].[SintomaUpdate] 1, 'Tos', '¿Tiene tos?',0,1,'ADMIN', 4
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[SintomaUpdate]
@EnfermedadId INT,
@Nombre VARCHAR(100),
@Pregunta VARCHAR(200),
@EsPrincipal INT,
@Estado INT,
@UsuarioModificacion VARCHAR(100),
@Id INT
AS
BEGIN

	SET NOCOUNT ON;
	DECLARE @FILASAFECTADA INT = 0;
	IF EXISTS (SELECT Id FROM [DiagnosticoExperto].[Sintoma] WHERE Id = @Id)
	BEGIN

		UPDATE [DiagnosticoExperto].[Sintoma] 
		SET EnfermedadId = @EnfermedadId,
		Nombre = @Nombre,
		Pregunta = @Pregunta,
		EsPrincipal = @EsPrincipal,
		Estado = @Estado,
		UsuarioModificacion = @UsuarioModificacion,
		FechaHoraModificacion = GETDATE()
		WHERE Id = @Id;

		SET @FILASAFECTADA = @Id;	
	END

	SELECT @FILASAFECTADA AS Id;
END
GO

-- =============================================      
-- Author:  MC      
-- Create date: 21/11/2016     
-- Description: Obtener Sintoma por Id
-- Test : [DiagnosticoExperto].[SintomaGetById] 1
-- =============================================  
CREATE PROCEDURE [DiagnosticoExperto].[SintomaGetById]
@Id INT
AS
BEGIN

	SET NOCOUNT ON;
	SELECT 
	Id,
	EnfermedadId,
	Nombre,
	Pregunta,
	EsPrincipal,
	Estado
	FROM [DiagnosticoExperto].[Sintoma]
	WHERE Id = @Id;	
END
GO