--
-- PostgreSQL database dump
--

-- Dumped from database version 14.3 (Ubuntu 14.3-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.3 (Ubuntu 14.3-1.pgdg20.04+1)

-- Started on 2023-05-03 23:12:39 -04

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 3417 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 6 (class 2615 OID 368945)
-- Name: seguridad; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA seguridad;


ALTER SCHEMA seguridad OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 220 (class 1259 OID 377178)
-- Name: cargo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cargo (
    id_cargo integer NOT NULL,
    nombre character varying(100),
    fecha_creacion date DEFAULT now(),
    fecha_update date DEFAULT now() NOT NULL,
    id_usuaio integer,
    tarifa character varying(100)
);


ALTER TABLE public.cargo OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 377177)
-- Name: cargo_id_cargo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cargo_id_cargo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cargo_id_cargo_seq OWNER TO postgres;

--
-- TOC entry 3418 (class 0 OID 0)
-- Dependencies: 219
-- Name: cargo_id_cargo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cargo_id_cargo_seq OWNED BY public.cargo.id_cargo;


--
-- TOC entry 222 (class 1259 OID 385379)
-- Name: comedor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.comedor (
    id_comedor integer NOT NULL,
    id_comensales integer NOT NULL,
    und_adscripcion character varying(100),
    cargo character varying(100),
    cedula character varying(10),
    nombre character varying(100),
    tarifa numeric,
    invitado numeric,
    autorizado numeric,
    total numeric,
    fecha_creacion date,
    id_usuaio integer
);


ALTER TABLE public.comedor OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 385378)
-- Name: comedor_id_comedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.comedor_id_comedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comedor_id_comedor_seq OWNER TO postgres;

--
-- TOC entry 3419 (class 0 OID 0)
-- Dependencies: 221
-- Name: comedor_id_comedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.comedor_id_comedor_seq OWNED BY public.comedor.id_comedor;


--
-- TOC entry 216 (class 1259 OID 377140)
-- Name: comensales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.comensales (
    id_comensales integer NOT NULL,
    id_und_adscripcion integer NOT NULL,
    cedula character varying(120) NOT NULL,
    nombre character varying(100),
    id_cargo integer NOT NULL,
    fecha_creacion date DEFAULT now(),
    fecha_update date DEFAULT now() NOT NULL,
    id_usuaio integer,
    autorizado integer
);


ALTER TABLE public.comensales OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 377139)
-- Name: comensales_id_comensales_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.comensales_id_comensales_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comensales_id_comensales_seq OWNER TO postgres;

--
-- TOC entry 3420 (class 0 OID 0)
-- Dependencies: 215
-- Name: comensales_id_comensales_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.comensales_id_comensales_seq OWNED BY public.comensales.id_comensales;


--
-- TOC entry 214 (class 1259 OID 377136)
-- Name: empresa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.empresa (
    id integer NOT NULL,
    descripcion character varying(50) NOT NULL,
    rif character varying(10),
    fecha timestamp without time zone NOT NULL,
    fecha_update timestamp without time zone
);


ALTER TABLE public.empresa OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 377169)
-- Name: und_adscripcion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.und_adscripcion (
    id_und_adscripcion integer NOT NULL,
    nombre character varying(100),
    fecha_creacion date DEFAULT now(),
    fecha_update date DEFAULT now() NOT NULL,
    id_usuaio integer
);


ALTER TABLE public.und_adscripcion OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 377168)
-- Name: und_adscripcion_id_und_adscripcion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.und_adscripcion_id_und_adscripcion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.und_adscripcion_id_und_adscripcion_seq OWNER TO postgres;

--
-- TOC entry 3421 (class 0 OID 0)
-- Dependencies: 217
-- Name: und_adscripcion_id_und_adscripcion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.und_adscripcion_id_und_adscripcion_seq OWNED BY public.und_adscripcion.id_und_adscripcion;


--
-- TOC entry 213 (class 1259 OID 368956)
-- Name: perfil; Type: TABLE; Schema: seguridad; Owner: postgres
--

CREATE TABLE seguridad.perfil (
    id_perfil integer NOT NULL,
    nombrep character varying(40),
    menu_rnce integer,
    menu_progr integer,
    menu_eval_desem integer,
    menu_reg_eval_desem integer,
    menu_soli_anular_eval_desem integer,
    menu_proc_anular_eval_desem integer,
    menu_comprobante_eval_desem integer,
    menu_estdi_eval_desem integer,
    menu_noregi_eval_desem integer,
    menu_llamado integer,
    consultar_llamado integer,
    reg_llamado integer,
    anul_llamado integer,
    ver_anul_llamado integer,
    ver_rnc integer,
    ver_conf integer,
    ver_parametro integer,
    ver_conf_publ integer,
    ver_user integer,
    ver_user_exter integer,
    ver_user_desb integer,
    ver_user_lista integer,
    ver_user_perfil integer,
    fecha_creacion date,
    menu_anulacion integer,
    menu_repor_evalu character varying,
    certi_externo integer,
    menu_certi integer,
    certificacion integer
);


ALTER TABLE seguridad.perfil OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 368955)
-- Name: perfil_id_perfil_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE seguridad.perfil_id_perfil_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.perfil_id_perfil_seq OWNER TO postgres;

--
-- TOC entry 3422 (class 0 OID 0)
-- Dependencies: 212
-- Name: perfil_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE seguridad.perfil_id_perfil_seq OWNED BY seguridad.perfil.id_perfil;


--
-- TOC entry 211 (class 1259 OID 368947)
-- Name: usuarios; Type: TABLE; Schema: seguridad; Owner: postgres
--

CREATE TABLE seguridad.usuarios (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    password text NOT NULL,
    email character varying(100),
    perfil integer,
    foto text,
    estado integer,
    ultimo_login timestamp without time zone NOT NULL,
    fecha timestamp without time zone NOT NULL,
    intentos integer,
    unidad character varying,
    fecha_update timestamp without time zone,
    id_estatus integer,
    rif_organoente character varying(10)
);


ALTER TABLE seguridad.usuarios OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 368946)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE seguridad.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.usuarios_id_seq OWNER TO postgres;

--
-- TOC entry 3423 (class 0 OID 0)
-- Dependencies: 210
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE seguridad.usuarios_id_seq OWNED BY seguridad.usuarios.id;


--
-- TOC entry 3250 (class 2604 OID 377181)
-- Name: cargo id_cargo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cargo ALTER COLUMN id_cargo SET DEFAULT nextval('public.cargo_id_cargo_seq'::regclass);


--
-- TOC entry 3253 (class 2604 OID 385382)
-- Name: comedor id_comedor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comedor ALTER COLUMN id_comedor SET DEFAULT nextval('public.comedor_id_comedor_seq'::regclass);


--
-- TOC entry 3244 (class 2604 OID 377143)
-- Name: comensales id_comensales; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comensales ALTER COLUMN id_comensales SET DEFAULT nextval('public.comensales_id_comensales_seq'::regclass);


--
-- TOC entry 3247 (class 2604 OID 377172)
-- Name: und_adscripcion id_und_adscripcion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.und_adscripcion ALTER COLUMN id_und_adscripcion SET DEFAULT nextval('public.und_adscripcion_id_und_adscripcion_seq'::regclass);


--
-- TOC entry 3243 (class 2604 OID 368959)
-- Name: perfil id_perfil; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.perfil ALTER COLUMN id_perfil SET DEFAULT nextval('seguridad.perfil_id_perfil_seq'::regclass);


--
-- TOC entry 3242 (class 2604 OID 368950)
-- Name: usuarios id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios ALTER COLUMN id SET DEFAULT nextval('seguridad.usuarios_id_seq'::regclass);


--
-- TOC entry 3409 (class 0 OID 377178)
-- Dependencies: 220
-- Data for Name: cargo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cargo (id_cargo, nombre, fecha_creacion, fecha_update, id_usuaio, tarifa) FROM stdin;
1	Direcctor	2023-04-28	2023-04-28	\N	2
2	Coordinador	2023-04-28	2023-04-28	\N	1
3	Analista	2023-04-28	2023-04-28	1	1
4	Apoyo	2023-05-03	2023-05-03	1	0
6	ADMINISTRADOR	2023-05-03	2023-05-03	2	1
5	OBRERO	2023-05-03	2023-05-03	2	1
\.


--
-- TOC entry 3411 (class 0 OID 385379)
-- Dependencies: 222
-- Data for Name: comedor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.comedor (id_comedor, id_comensales, und_adscripcion, cargo, cedula, nombre, tarifa, invitado, autorizado, total, fecha_creacion, id_usuaio) FROM stdin;
1	1	Infraestructura y Proyectos	Direcctor	\N	\N	2	0	0	2	2023-05-03	2
2	3	Proyectos Especiales	Coordinador	\N	\N	1	0	10	10	2023-05-03	2
3	7	Infraestructura y Proyectos	Apoyo	\N	\N	0	0	0	0	2023-05-03	2
\.


--
-- TOC entry 3405 (class 0 OID 377140)
-- Dependencies: 216
-- Data for Name: comensales; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.comensales (id_comensales, id_und_adscripcion, cedula, nombre, id_cargo, fecha_creacion, fecha_update, id_usuaio, autorizado) FROM stdin;
1	14	21151374	SILED DELGADO	1	2023-04-28	2023-04-28	2	0
2	16	10825818	CAROLINA CAMPOS	1	2023-04-28	2023-04-28	2	0
4	8	333333	PROEVENTOS MERIDA CA	4	2023-05-03	2023-05-03	2	0
3	15	859666	NIKODEMO SYSTEMS, C.A.	2	2023-04-29	2023-04-29	2	15
7	14	ROMERO ROMERO	A.P.S. CONSULTORES Y ASOCIADOS C.A.	4	2023-05-03	2023-05-03	2	0
\.


--
-- TOC entry 3403 (class 0 OID 377136)
-- Dependencies: 214
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.empresa (id, descripcion, rif, fecha, fecha_update) FROM stdin;
1	CIUDAD CARIBIA	20	2023-04-27 00:00:00	2023-04-27 00:00:00
\.


--
-- TOC entry 3407 (class 0 OID 377169)
-- Dependencies: 218
-- Data for Name: und_adscripcion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.und_adscripcion (id_und_adscripcion, nombre, fecha_creacion, fecha_update, id_usuaio) FROM stdin;
14	Infraestructura y Proyectos	2023-04-28	2023-04-28	1
15	Proyectos Especiales	2023-04-28	2023-04-28	1
16	Tecnología e Información de las Comunicaciones	2023-04-28	2023-04-28	1
17	Consultoría Jurídica	2023-04-28	2023-04-28	1
18	Ofic. de Gestión H.	2023-04-28	2023-04-28	1
19	Administración	2023-04-28	2023-04-28	1
20	Comedor-Escuela "Guerreros de la Montaña"	2023-04-28	2023-04-28	1
21	Escuela de Boxeo "Guerreros de la Montaña"	2023-04-28	2023-04-28	1
22	Escuela de Boxeo "Guerreros de la Montaña"	2023-04-28	2023-04-28	1
23	División de Investigaciones Penales (DIP)	2023-04-28	2023-04-28	1
24	Conductores	2023-04-28	2023-04-28	1
25	Fiscalía	2023-04-28	2023-04-28	1
26	Padre Numa	2023-04-28	2023-04-28	\N
27	Club de los Abuelos	2023-04-28	2023-04-28	1
1	Autoridad Única	2023-04-28	2023-04-28	1
2	Ejecutiva	2023-04-28	2023-04-28	1
3	Despacho	2023-04-28	2023-04-28	1
4	Comercio y Recaudación	2023-04-28	2023-04-28	1
5	Educación, Cultura y Deporte	2023-04-28	2023-04-28	1
6	Gestión Social y Desarrollo Comunitario	2023-04-28	2023-04-28	1
7	Atención al Ciudadano	2023-04-28	2023-04-28	1
8	Justicia y Paz	2023-04-28	2023-04-28	1
9	Gestión Ambiental y Acervo Histórico	2023-04-28	2023-04-28	1
10	Atención a la Salud	2023-04-28	2023-04-28	1
11	Prevención, Seguridad Ciudadana y Administración de Desastres	2023-04-28	2023-04-28	1
12	Gestión Habitacional	2023-04-28	2023-04-28	1
13	Servicios Públicos y Apoyo a la Comunidad	2023-04-28	2023-04-28	1
\.


--
-- TOC entry 3402 (class 0 OID 368956)
-- Dependencies: 213
-- Data for Name: perfil; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.perfil (id_perfil, nombrep, menu_rnce, menu_progr, menu_eval_desem, menu_reg_eval_desem, menu_soli_anular_eval_desem, menu_proc_anular_eval_desem, menu_comprobante_eval_desem, menu_estdi_eval_desem, menu_noregi_eval_desem, menu_llamado, consultar_llamado, reg_llamado, anul_llamado, ver_anul_llamado, ver_rnc, ver_conf, ver_parametro, ver_conf_publ, ver_user, ver_user_exter, ver_user_desb, ver_user_lista, ver_user_perfil, fecha_creacion, menu_anulacion, menu_repor_evalu, certi_externo, menu_certi, certificacion) FROM stdin;
1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	1	2023-02-02	1	1	1	1	1
\.


--
-- TOC entry 3400 (class 0 OID 368947)
-- Dependencies: 211
-- Data for Name: usuarios; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.usuarios (id, nombre, password, email, perfil, foto, estado, ultimo_login, fecha, intentos, unidad, fecha_update, id_estatus, rif_organoente) FROM stdin;
2	Suad1417*	$2y$10$FvUI2xGWp8EInJDHZ3gFx.cmnxA0bQ7xuM7Yu1kr8YpcClloCmDR2	prueba@gmail.com	1	1	1	2023-02-02 00:00:00	2023-02-02 00:00:00	0	20	\N	1	20
\.


--
-- TOC entry 3424 (class 0 OID 0)
-- Dependencies: 219
-- Name: cargo_id_cargo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cargo_id_cargo_seq', 2, true);


--
-- TOC entry 3425 (class 0 OID 0)
-- Dependencies: 221
-- Name: comedor_id_comedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.comedor_id_comedor_seq', 1, false);


--
-- TOC entry 3426 (class 0 OID 0)
-- Dependencies: 215
-- Name: comensales_id_comensales_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.comensales_id_comensales_seq', 7, true);


--
-- TOC entry 3427 (class 0 OID 0)
-- Dependencies: 217
-- Name: und_adscripcion_id_und_adscripcion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.und_adscripcion_id_und_adscripcion_seq', 1, false);


--
-- TOC entry 3428 (class 0 OID 0)
-- Dependencies: 212
-- Name: perfil_id_perfil_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('seguridad.perfil_id_perfil_seq', 1, false);


--
-- TOC entry 3429 (class 0 OID 0)
-- Dependencies: 210
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('seguridad.usuarios_id_seq', 2, true);


--
-- TOC entry 3259 (class 2606 OID 377185)
-- Name: cargo cargo_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cargo
    ADD CONSTRAINT cargo_pk PRIMARY KEY (id_cargo);


--
-- TOC entry 3257 (class 2606 OID 377176)
-- Name: und_adscripcion und_adscripcion_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.und_adscripcion
    ADD CONSTRAINT und_adscripcion_pk PRIMARY KEY (id_und_adscripcion);


--
-- TOC entry 3255 (class 2606 OID 368954)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


-- Completed on 2023-05-03 23:12:40 -04

--
-- PostgreSQL database dump complete
--

