--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.5
-- Dumped by pg_dump version 9.4.5
-- Started on 2017-09-21 09:56:25

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 210 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2237 (class 0 OID 0)
-- Dependencies: 210
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 200 (class 1259 OID 18437)
-- Name: terroircp; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE terroircp (
    id integer NOT NULL,
    terroir_id integer,
    chargeprojet_id integer
);


ALTER TABLE terroircp OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 18440)
-- Name: accesterroir_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE accesterroir_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE accesterroir_id_seq OWNER TO postgres;

--
-- TOC entry 2238 (class 0 OID 0)
-- Dependencies: 201
-- Name: accesterroir_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE accesterroir_id_seq OWNED BY terroircp.id;


--
-- TOC entry 199 (class 1259 OID 18356)
-- Name: administration; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE administration (
    id integer NOT NULL,
    nom character varying(50),
    prenom character varying(50),
    datenaissance date,
    email text,
    motpasse character varying(40)
);


ALTER TABLE administration OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 18354)
-- Name: administration_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE administration_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE administration_id_seq OWNER TO postgres;

--
-- TOC entry 2239 (class 0 OID 0)
-- Dependencies: 198
-- Name: administration_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE administration_id_seq OWNED BY administration.id;


--
-- TOC entry 183 (class 1259 OID 18178)
-- Name: agencepaiement; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE agencepaiement (
    id integer NOT NULL,
    nom character varying(20)
);


ALTER TABLE agencepaiement OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 18176)
-- Name: agencepaiement_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE agencepaiement_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE agencepaiement_id_seq OWNER TO postgres;

--
-- TOC entry 2240 (class 0 OID 0)
-- Dependencies: 182
-- Name: agencepaiement_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE agencepaiement_id_seq OWNED BY agencepaiement.id;


--
-- TOC entry 197 (class 1259 OID 18345)
-- Name: chargeprojet; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE chargeprojet (
    id integer NOT NULL,
    nom character varying(50),
    prenom character varying(50),
    email text,
    motpasse character varying(20),
    datenaissance date,
    pseudo character varying(5)
);


ALTER TABLE chargeprojet OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 18343)
-- Name: chargeprojet_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE chargeprojet_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE chargeprojet_id_seq OWNER TO postgres;

--
-- TOC entry 2241 (class 0 OID 0)
-- Dependencies: 196
-- Name: chargeprojet_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE chargeprojet_id_seq OWNED BY chargeprojet.id;


--
-- TOC entry 203 (class 1259 OID 18460)
-- Name: inscriptionchargeprojet; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inscriptionchargeprojet (
    id integer NOT NULL,
    nom character varying(50),
    prenom character varying(50),
    datenaissance date,
    email text,
    pseudo character varying(5),
    motpasse character varying(40),
    denregistrement date,
    token character varying(40)
);


ALTER TABLE inscriptionchargeprojet OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 18458)
-- Name: chargeprojetinscription_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE chargeprojetinscription_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE chargeprojetinscription_id_seq OWNER TO postgres;

--
-- TOC entry 2242 (class 0 OID 0)
-- Dependencies: 202
-- Name: chargeprojetinscription_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE chargeprojetinscription_id_seq OWNED BY inscriptionchargeprojet.id;


--
-- TOC entry 173 (class 1259 OID 18133)
-- Name: commune; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE commune (
    id integer NOT NULL,
    nom character varying(50)
);


ALTER TABLE commune OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 18131)
-- Name: commune_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE commune_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE commune_id_seq OWNER TO postgres;

--
-- TOC entry 2243 (class 0 OID 0)
-- Dependencies: 172
-- Name: commune_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE commune_id_seq OWNED BY commune.id;


--
-- TOC entry 179 (class 1259 OID 18162)
-- Name: dir; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE dir (
    id integer NOT NULL,
    nom character varying(5)
);


ALTER TABLE dir OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 18160)
-- Name: dir_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE dir_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dir_id_seq OWNER TO postgres;

--
-- TOC entry 2244 (class 0 OID 0)
-- Dependencies: 178
-- Name: dir_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE dir_id_seq OWNED BY dir.id;


--
-- TOC entry 177 (class 1259 OID 18154)
-- Name: district; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE district (
    id integer NOT NULL,
    nom character varying(50)
);


ALTER TABLE district OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 18152)
-- Name: district_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE district_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE district_id_seq OWNER TO postgres;

--
-- TOC entry 2245 (class 0 OID 0)
-- Dependencies: 176
-- Name: district_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE district_id_seq OWNED BY district.id;


--
-- TOC entry 175 (class 1259 OID 18141)
-- Name: fokotany; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE fokotany (
    id integer NOT NULL,
    nom character varying(50),
    commune integer
);


ALTER TABLE fokotany OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 18139)
-- Name: fokotany_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE fokotany_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE fokotany_id_seq OWNER TO postgres;

--
-- TOC entry 2246 (class 0 OID 0)
-- Dependencies: 174
-- Name: fokotany_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE fokotany_id_seq OWNED BY fokotany.id;


--
-- TOC entry 191 (class 1259 OID 18244)
-- Name: groupetravail; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE groupetravail (
    id integer NOT NULL,
    nom character varying(50),
    codechantier character varying(8),
    terroir_id integer
);


ALTER TABLE groupetravail OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 18242)
-- Name: groupetravail_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE groupetravail_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE groupetravail_id_seq OWNER TO postgres;

--
-- TOC entry 2247 (class 0 OID 0)
-- Dependencies: 190
-- Name: groupetravail_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE groupetravail_id_seq OWNED BY groupetravail.id;


--
-- TOC entry 189 (class 1259 OID 18235)
-- Name: intervention; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE intervention (
    id integer NOT NULL,
    dureetravaux smallint,
    dpdebut date,
    drdebut date,
    dprtx date,
    drrtx date,
    nbpbenef smallint,
    nbrbenef smallint,
    nbrbenefapte smallint,
    nbfemmebenefapte smallint,
    nbbenefinapte smallint,
    nbphommejourapte smallint,
    nbrhommejourapte smallint,
    psurftraiteeces numeric(5,3) DEFAULT 0,
    rsurftraiteeces numeric(5,3) DEFAULT 0,
    psurfboiseefsp numeric(5,3) DEFAULT 0,
    rsurfboiseefsp numeric(5,3) DEFAULT 0,
    libelleautreindic character varying(50),
    prevautreindic smallint,
    observationindic text,
    uniteautreindic integer,
    groupetravail_id integer,
    nature_id integer,
    phase_id integer,
    rang smallint,
    realautreindic smallint,
    dppaiement1 date,
    drpaiement1 date,
    dppaiement2 date,
    drpaiement2 date,
    dppaiement3 date,
    drpaiement3 date,
    intitule_id integer
);


ALTER TABLE intervention OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 18233)
-- Name: intervention_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE intervention_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE intervention_id_seq OWNER TO postgres;

--
-- TOC entry 2248 (class 0 OID 0)
-- Dependencies: 188
-- Name: intervention_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE intervention_id_seq OWNED BY intervention.id;


--
-- TOC entry 209 (class 1259 OID 18527)
-- Name: interventionintitule; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE interventionintitule (
    id integer NOT NULL,
    intervention_id integer,
    intitule_id integer
);


ALTER TABLE interventionintitule OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 18525)
-- Name: interventionintitule_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE interventionintitule_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE interventionintitule_id_seq OWNER TO postgres;

--
-- TOC entry 2249 (class 0 OID 0)
-- Dependencies: 208
-- Name: interventionintitule_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE interventionintitule_id_seq OWNED BY interventionintitule.id;


--
-- TOC entry 207 (class 1259 OID 18513)
-- Name: intitule; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE intitule (
    id integer NOT NULL,
    nom character varying(100)
);


ALTER TABLE intitule OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 18511)
-- Name: intitule_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE intitule_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE intitule_id_seq OWNER TO postgres;

--
-- TOC entry 2250 (class 0 OID 0)
-- Dependencies: 206
-- Name: intitule_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE intitule_id_seq OWNED BY intitule.id;


--
-- TOC entry 193 (class 1259 OID 18257)
-- Name: nature; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE nature (
    id integer NOT NULL,
    nom character varying(20)
);


ALTER TABLE nature OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 18255)
-- Name: nature_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE nature_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE nature_id_seq OWNER TO postgres;

--
-- TOC entry 2251 (class 0 OID 0)
-- Dependencies: 192
-- Name: nature_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE nature_id_seq OWNED BY nature.id;


--
-- TOC entry 205 (class 1259 OID 18490)
-- Name: paiement; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE paiement (
    id integer NOT NULL,
    dateprevue date,
    datereelle date,
    intervention_id integer
);


ALTER TABLE paiement OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 18488)
-- Name: paiement_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paiement_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paiement_id_seq OWNER TO postgres;

--
-- TOC entry 2252 (class 0 OID 0)
-- Dependencies: 204
-- Name: paiement_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE paiement_id_seq OWNED BY paiement.id;


--
-- TOC entry 195 (class 1259 OID 18287)
-- Name: phase; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE phase (
    id integer NOT NULL,
    valeur character varying(5)
);


ALTER TABLE phase OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 18285)
-- Name: phase_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE phase_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE phase_id_seq OWNER TO postgres;

--
-- TOC entry 2253 (class 0 OID 0)
-- Dependencies: 194
-- Name: phase_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE phase_id_seq OWNED BY phase.id;


--
-- TOC entry 181 (class 1259 OID 18170)
-- Name: prestataire; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE prestataire (
    id integer NOT NULL,
    nom character varying(50)
);


ALTER TABLE prestataire OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 18168)
-- Name: prestataire_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE prestataire_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prestataire_id_seq OWNER TO postgres;

--
-- TOC entry 2254 (class 0 OID 0)
-- Dependencies: 180
-- Name: prestataire_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE prestataire_id_seq OWNED BY prestataire.id;


--
-- TOC entry 187 (class 1259 OID 18194)
-- Name: terroir; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE terroir (
    id integer NOT NULL,
    nom character varying(50),
    dir_id integer,
    district_id integer,
    nbsa smallint DEFAULT 0,
    dpengplan date,
    drengplan date,
    codemarcheplan character varying(10),
    dpfinplan date,
    drfinplan date,
    montantreelplan double precision,
    dpapprobpamo date,
    drapprobpamo date,
    montanttotalpamo double precision,
    dpengcible date,
    drengcible date,
    codemarchecible character varying(10),
    dpfincible date,
    drfincible date,
    montantreelcible double precision,
    dvalidcom date,
    dpengagec date,
    drengagec date,
    codemarcheagec character varying(10),
    dpfinagec date,
    drfinagec date,
    montanttotalagec double precision,
    montanttotalconfieagec double precision,
    codemarchepaie character varying(10),
    montantreelpaie double precision,
    prevsurftraiteeces double precision DEFAULT 0,
    realsurftraiteeces double precision DEFAULT 0,
    prevsurfreboiseefsp double precision DEFAULT 0,
    realsurfreboiseefsp double precision DEFAULT 0,
    libelleautreindic character varying(40),
    prevautreindic double precision DEFAULT 0,
    realautreindic double precision DEFAULT 0,
    observationindic text,
    prestataireagec_id integer,
    prestataireplan_id integer,
    prestatairecible_id integer,
    agencepaiement_id integer,
    nbbenef smallint DEFAULT 0,
    nbinapte smallint DEFAULT 0,
    cp_id integer
);


ALTER TABLE terroir OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 18192)
-- Name: terroir_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE terroir_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE terroir_id_seq OWNER TO postgres;

--
-- TOC entry 2255 (class 0 OID 0)
-- Dependencies: 186
-- Name: terroir_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE terroir_id_seq OWNED BY terroir.id;


--
-- TOC entry 185 (class 1259 OID 18186)
-- Name: unite; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE unite (
    id integer NOT NULL,
    valeur character varying(10)
);


ALTER TABLE unite OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 18184)
-- Name: unite_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE unite_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE unite_id_seq OWNER TO postgres;

--
-- TOC entry 2256 (class 0 OID 0)
-- Dependencies: 184
-- Name: unite_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE unite_id_seq OWNED BY unite.id;


--
-- TOC entry 2020 (class 2604 OID 18359)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY administration ALTER COLUMN id SET DEFAULT nextval('administration_id_seq'::regclass);


--
-- TOC entry 1999 (class 2604 OID 18181)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY agencepaiement ALTER COLUMN id SET DEFAULT nextval('agencepaiement_id_seq'::regclass);


--
-- TOC entry 2019 (class 2604 OID 18348)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY chargeprojet ALTER COLUMN id SET DEFAULT nextval('chargeprojet_id_seq'::regclass);


--
-- TOC entry 1994 (class 2604 OID 18136)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY commune ALTER COLUMN id SET DEFAULT nextval('commune_id_seq'::regclass);


--
-- TOC entry 1997 (class 2604 OID 18165)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dir ALTER COLUMN id SET DEFAULT nextval('dir_id_seq'::regclass);


--
-- TOC entry 1996 (class 2604 OID 18157)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY district ALTER COLUMN id SET DEFAULT nextval('district_id_seq'::regclass);


--
-- TOC entry 1995 (class 2604 OID 18144)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY fokotany ALTER COLUMN id SET DEFAULT nextval('fokotany_id_seq'::regclass);


--
-- TOC entry 2016 (class 2604 OID 18247)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY groupetravail ALTER COLUMN id SET DEFAULT nextval('groupetravail_id_seq'::regclass);


--
-- TOC entry 2022 (class 2604 OID 18463)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscriptionchargeprojet ALTER COLUMN id SET DEFAULT nextval('chargeprojetinscription_id_seq'::regclass);


--
-- TOC entry 2011 (class 2604 OID 18238)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY intervention ALTER COLUMN id SET DEFAULT nextval('intervention_id_seq'::regclass);


--
-- TOC entry 2025 (class 2604 OID 18530)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY interventionintitule ALTER COLUMN id SET DEFAULT nextval('interventionintitule_id_seq'::regclass);


--
-- TOC entry 2024 (class 2604 OID 18516)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY intitule ALTER COLUMN id SET DEFAULT nextval('intitule_id_seq'::regclass);


--
-- TOC entry 2017 (class 2604 OID 18260)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY nature ALTER COLUMN id SET DEFAULT nextval('nature_id_seq'::regclass);


--
-- TOC entry 2023 (class 2604 OID 18493)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paiement ALTER COLUMN id SET DEFAULT nextval('paiement_id_seq'::regclass);


--
-- TOC entry 2018 (class 2604 OID 18290)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY phase ALTER COLUMN id SET DEFAULT nextval('phase_id_seq'::regclass);


--
-- TOC entry 1998 (class 2604 OID 18173)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY prestataire ALTER COLUMN id SET DEFAULT nextval('prestataire_id_seq'::regclass);


--
-- TOC entry 2001 (class 2604 OID 18197)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroir ALTER COLUMN id SET DEFAULT nextval('terroir_id_seq'::regclass);


--
-- TOC entry 2021 (class 2604 OID 18442)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroircp ALTER COLUMN id SET DEFAULT nextval('accesterroir_id_seq'::regclass);


--
-- TOC entry 2000 (class 2604 OID 18189)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY unite ALTER COLUMN id SET DEFAULT nextval('unite_id_seq'::regclass);


--
-- TOC entry 2257 (class 0 OID 0)
-- Dependencies: 201
-- Name: accesterroir_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('accesterroir_id_seq', 1, true);


--
-- TOC entry 2219 (class 0 OID 18356)
-- Dependencies: 199
-- Data for Name: administration; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO administration VALUES (1, 'rakoto', 'rakoto', NULL, 'rakoto@gmail.com', 'rakoto');


--
-- TOC entry 2258 (class 0 OID 0)
-- Dependencies: 198
-- Name: administration_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('administration_id_seq', 1, true);


--
-- TOC entry 2203 (class 0 OID 18178)
-- Dependencies: 183
-- Data for Name: agencepaiement; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO agencepaiement VALUES (1, 'TELMA');
INSERT INTO agencepaiement VALUES (2, 'ORANGE');
INSERT INTO agencepaiement VALUES (3, 'AIRTEL');
INSERT INTO agencepaiement VALUES (4, 'OTIV');
INSERT INTO agencepaiement VALUES (5, 'RIANTSOA');
INSERT INTO agencepaiement VALUES (6, 'SAF/FJKM');
INSERT INTO agencepaiement VALUES (7, 'IDEALY');
INSERT INTO agencepaiement VALUES (8, 'SOARAFITRA LOVATINA');


--
-- TOC entry 2259 (class 0 OID 0)
-- Dependencies: 182
-- Name: agencepaiement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('agencepaiement_id_seq', 9, true);


--
-- TOC entry 2217 (class 0 OID 18345)
-- Dependencies: 197
-- Data for Name: chargeprojet; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO chargeprojet VALUES (1, 'Razafindratsifa', 'Andy', 'andy@gmail.com', 'andy', NULL, 'AND');
INSERT INTO chargeprojet VALUES (2, 'Andriantahina', 'Ranto', 'ranto@gmail.com', 'ranto', NULL, 'RNT');
INSERT INTO chargeprojet VALUES (7, 'Rasolofo', 'Solo', 'andy@mymail.local', 'solo', '2017-08-29', 'SOL');
INSERT INTO chargeprojet VALUES (8, 'Rafidy', 'Fidy', 'itu@mymail.local', 'fidy', '2017-08-29', 'FID');


--
-- TOC entry 2260 (class 0 OID 0)
-- Dependencies: 196
-- Name: chargeprojet_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('chargeprojet_id_seq', 8, true);


--
-- TOC entry 2261 (class 0 OID 0)
-- Dependencies: 202
-- Name: chargeprojetinscription_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('chargeprojetinscription_id_seq', 15, true);


--
-- TOC entry 2193 (class 0 OID 18133)
-- Dependencies: 173
-- Data for Name: commune; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2262 (class 0 OID 0)
-- Dependencies: 172
-- Name: commune_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('commune_id_seq', 1, false);


--
-- TOC entry 2199 (class 0 OID 18162)
-- Dependencies: 179
-- Data for Name: dir; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO dir VALUES (1, 'DiRT');


--
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 178
-- Name: dir_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('dir_id_seq', 1, true);


--
-- TOC entry 2197 (class 0 OID 18154)
-- Dependencies: 177
-- Data for Name: district; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO district VALUES (1, 'ANTANIFOTSY');


--
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 176
-- Name: district_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('district_id_seq', 1, true);


--
-- TOC entry 2195 (class 0 OID 18141)
-- Dependencies: 175
-- Data for Name: fokotany; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 174
-- Name: fokotany_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('fokotany_id_seq', 1, false);


--
-- TOC entry 2211 (class 0 OID 18244)
-- Dependencies: 191
-- Data for Name: groupetravail; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO groupetravail VALUES (5, 'ANTAMIANA', '1aT02E', 1);
INSERT INTO groupetravail VALUES (9, 'TSARATANANA', '1aT02A', 3);
INSERT INTO groupetravail VALUES (10, 'SARODROA', '1aT02B', 3);
INSERT INTO groupetravail VALUES (11, 'MASIMPIEFERANA', '1aT02C', 3);
INSERT INTO groupetravail VALUES (13, 'SOAMANADRARINY', '1aT02A', 4);
INSERT INTO groupetravail VALUES (14, 'ANKAZONDRANO-ANTANIKATSAKA', '1aT02B', 4);
INSERT INTO groupetravail VALUES (15, 'AMBATOHARANANA', '1aT02A', 5);
INSERT INTO groupetravail VALUES (16, 'AMBATOSIRA', '1aT02B', 5);
INSERT INTO groupetravail VALUES (17, 'AMBATODIDY', '1aT02C', 5);
INSERT INTO groupetravail VALUES (18, 'AMBATOLAMPIKELY - ANJAMANGA', '1aT02D', 5);
INSERT INTO groupetravail VALUES (19, 'AMBOHITOMPOINA - ANDOHARANOFOTSY', '1aT02A', 6);
INSERT INTO groupetravail VALUES (20, 'AMBOHITOMPOINA EST', '1aT02B', 6);
INSERT INTO groupetravail VALUES (21, 'SAHANAMALONA BAS', '1aT02C', 6);
INSERT INTO groupetravail VALUES (22, 'AMBOHIMANDROSO', '1aT02D', 6);
INSERT INTO groupetravail VALUES (23, 'MORARANO EST', '1aT02A', 7);
INSERT INTO groupetravail VALUES (24, 'ANDOHARIANA', '1aT02B', 7);
INSERT INTO groupetravail VALUES (25, 'ANTANETILAVA- AMBATOLAHY', '1aT02C', 7);
INSERT INTO groupetravail VALUES (26, 'MAHATSINJO', '1aT02D', 7);
INSERT INTO groupetravail VALUES (27, 'ANTAMBOHOMENA - AMBOAVAHY', '1aT02A', 8);
INSERT INTO groupetravail VALUES (28, 'ANKAZOAVO', '1aT02B', 8);
INSERT INTO groupetravail VALUES (29, 'ANTAMBIAZINA', '1aT02C', 8);
INSERT INTO groupetravail VALUES (30, 'ANALAMBANO - AMBATOMIADY', '1aT02A', 9);
INSERT INTO groupetravail VALUES (34, 'AMPANGABE - IALATSARA', '1aT02B', 9);
INSERT INTO groupetravail VALUES (35, 'TSARAHONENANA', '1aT02A', 10);
INSERT INTO groupetravail VALUES (36, 'AMBATOASANA - AMBOAFOTSY - ANTOBY TSARAMANDROSO', '1aT02B', 10);
INSERT INTO groupetravail VALUES (37, 'MAHATSINJO CENTRE', '1aT02C', 10);
INSERT INTO groupetravail VALUES (38, 'AMBONIVARY - MORARANO', '1aT02D', 10);
INSERT INTO groupetravail VALUES (39, 'AMBONIANDREFANA', '1aT02A', 11);
INSERT INTO groupetravail VALUES (40, 'AMBOHIMANDROSO SUD', '1aT02B', 11);
INSERT INTO groupetravail VALUES (41, 'MANANETIVOHITRA - AMBOHITSARABE', '1aT02C', 11);
INSERT INTO groupetravail VALUES (42, 'MASOANDRO', '1aT02D', 11);
INSERT INTO groupetravail VALUES (43, 'AMORONA - AMPITATAFIKA', '1aT02E', 11);
INSERT INTO groupetravail VALUES (44, 'MAROMOKA FONENANTSOA - MAROMOKA BAS', '1aT02A', 12);
INSERT INTO groupetravail VALUES (45, 'MAHAKETRAKA', '1aT02B', 12);
INSERT INTO groupetravail VALUES (46, 'AMBOHIMANDROSO A - AMBOHIMANDROSO B', '1aT02C', 12);
INSERT INTO groupetravail VALUES (47, 'AMBATONDRATSIRA - AMBATOTOKANA - ANOSIROA', '1aT02A', 13);
INSERT INTO groupetravail VALUES (48, 'ANJAVIDY', '1aT02B', 13);
INSERT INTO groupetravail VALUES (49, 'AMBOHIMALAZA', '1aT02C', 13);
INSERT INTO groupetravail VALUES (50, 'MANOHISOA', '1aT02A', 14);
INSERT INTO groupetravail VALUES (51, 'TSARAHONENANA - SOAFIRAISANA', '1aT02B', 14);
INSERT INTO groupetravail VALUES (52, 'IBONGAMAHASOA - AMBOHIKAMBANA', '1aT02C', 14);
INSERT INTO groupetravail VALUES (53, 'MAHATSINJO', '1aT02A', 15);
INSERT INTO groupetravail VALUES (54, 'AMORONA', '1aT02B', 15);
INSERT INTO groupetravail VALUES (55, 'AMBATOLAMPY - AMBOHIJANAKA', '1aT02A', 16);
INSERT INTO groupetravail VALUES (56, 'ANTEMOTRA-AMBONIANDREFANA-BEMASOANDRO', '1aT02B', 16);
INSERT INTO groupetravail VALUES (57, 'ANDREFANIALA - ANTANETY', '1aT02C', 16);
INSERT INTO groupetravail VALUES (58, 'ANDRANOMALAZA-FIERENANA', '1aT02D', 16);
INSERT INTO groupetravail VALUES (59, 'ANTANAMBAO', '1aT02A', 17);
INSERT INTO groupetravail VALUES (60, 'ANDRIATSILAHY', '1aT02B', 17);
INSERT INTO groupetravail VALUES (61, 'ANGAVO EST', '1aT02C', 17);
INSERT INTO groupetravail VALUES (62, 'AMBATOMIANKINA NORD', '1aT02D', 17);
INSERT INTO groupetravail VALUES (63, 'ANONDRILAHY - BEPAISO - AMBODIRIANA', '1aT02E', 17);
INSERT INTO groupetravail VALUES (64, 'ANDOHAFARIHY', '1aT02A', 18);
INSERT INTO groupetravail VALUES (65, 'ANDOHAVARY II', '1aT02B', 18);
INSERT INTO groupetravail VALUES (66, 'MAHALAVOLONA', '1aT02C', 18);
INSERT INTO groupetravail VALUES (67, 'MORARANO III', '1aT02D', 18);
INSERT INTO groupetravail VALUES (68, 'ANTSAHAMAINA', '1aT02E', 18);
INSERT INTO groupetravail VALUES (69, 'ANTANETY NORD - ANTOBINIARO', '1aT02F', 18);
INSERT INTO groupetravail VALUES (2, 'AMBATOHARANANA', '1aT02B', 1);
INSERT INTO groupetravail VALUES (3, 'AMBATOTOKANA', '1aT02C', 1);
INSERT INTO groupetravail VALUES (4, 'AMBOHIMANDROSOKELY', '1aT02D', 1);
INSERT INTO groupetravail VALUES (7, 'SAONJORANO - AMBATOBOKA', '1aT02B', 2);
INSERT INTO groupetravail VALUES (1, 'BELANITRA - ANKADIVORY', '1aT02A', 1);
INSERT INTO groupetravail VALUES (6, 'MANANETIVOHITRA - IANABORONA', '1aT02A', 2);
INSERT INTO groupetravail VALUES (8, 'AMBILONA - ANTANETY', '1aT02C', 2);
INSERT INTO groupetravail VALUES (12, 'MANANITRA - ANOSILEHIBE', '1aT02D', 3);


--
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 190
-- Name: groupetravail_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('groupetravail_id_seq', 69, true);


--
-- TOC entry 2223 (class 0 OID 18460)
-- Dependencies: 203
-- Data for Name: inscriptionchargeprojet; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO inscriptionchargeprojet VALUES (12, 'Rasolofo', 'Solo', '2017-08-29', 'andy@mymail.local', 'SOL', 'solo', '2017-08-29', '9c0d9c60e356b603db93a6634d154135c0319cb3');
INSERT INTO inscriptionchargeprojet VALUES (14, 'Rafidy', 'Fidy', '2017-08-29', 'itu@mymail.local', 'FID', 'fidy', '2017-08-29', 'ec11f2b30fb610f28460d592e1b4e7a0ea7bb170');


--
-- TOC entry 2209 (class 0 OID 18235)
-- Dependencies: 189
-- Data for Name: intervention; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO intervention VALUES (9, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 141, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 1, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (106, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 125, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 54, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 6);
INSERT INTO intervention VALUES (107, 40, '2017-04-03', '2017-02-28', '2017-07-28', '2017-04-26', 62, 78, 60, 30, 18, 1840, 2400, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 55, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-05-15', 2);
INSERT INTO intervention VALUES (108, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 92, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 55, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 7);
INSERT INTO intervention VALUES (125, 40, '2017-04-03', '2017-02-28', '2017-08-18', '2017-04-25', 149, 46, 31, 27, 15, 5360, 1240, 2.600, 1.720, 0.800, 0.400, '', 0, '', 1, 64, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-21', '2017-05-14', '2017-05-15', 8);
INSERT INTO intervention VALUES (102, 40, '2017-04-03', '2017-02-28', '2017-08-18', '2017-04-25', 132, 71, 49, 12, 22, 4400, 1960, 2.600, 2.600, 0.000, 0.000, '', 0, '', 1, 67, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-21', '2017-05-14', '2017-05-15', 2);
INSERT INTO intervention VALUES (136, 40, '2017-04-18', '2017-04-28', '2017-08-04', '2017-06-28', 248, 94, 79, 18, 15, 8640, 3160, 1.460, 1.000, 0.000, 0.000, '', 0, '', 1, 52, NULL, 3, 1, 0, '2017-05-16', '2017-05-17', '2017-06-10', '2017-06-15', '2017-07-12', '2017-07-25', 2);
INSERT INTO intervention VALUES (137, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 107, 0, 0, 0, 0, 4280, 0, 0.000, 0.000, 0.000, 0.000, '', 9708, '', 1, 52, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 7);
INSERT INTO intervention VALUES (111, 40, '2017-04-03', '2017-02-28', '2017-07-28', '2017-04-26', 239, 101, 84, 45, 17, 8880, 3360, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 57, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-05-15', 2);
INSERT INTO intervention VALUES (112, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 156, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 57, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 7);
INSERT INTO intervention VALUES (113, 40, '2017-04-03', '2017-02-28', '2017-07-28', '2017-04-26', 87, 50, 39, 15, 11, 2800, 1560, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 58, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-05-15', 2);
INSERT INTO intervention VALUES (114, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 70, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 58, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 7);
INSERT INTO intervention VALUES (115, 40, '2017-04-03', '2017-02-28', '2017-06-30', '2017-04-26', 148, 37, 33, 13, 4, 5000, 1320, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 59, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-05-15', 2);
INSERT INTO intervention VALUES (1, 40, '2017-04-03', '2017-03-30', '2017-07-31', '2017-05-25', 230, 89, 68, 38, 21, 8680, 2720, 5.220, 0.000, 0.000, 0.000, '', 0, '', 1, 1, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO intervention VALUES (103, 40, '2017-04-03', '2017-02-14', '2017-06-30', '2017-05-10', 96, 57, 39, 24, 18, 3160, 1560, 0.000, 0.000, 1.290, 1.290, '', 0, '', 1, 53, NULL, 3, 1, 0, '2017-04-01', '2017-04-10', NULL, NULL, '2017-05-28', '2017-05-31', 1);
INSERT INTO intervention VALUES (7, 40, '2017-04-03', '2017-03-17', '2017-05-31', '2017-05-13', 136, 90, 70, 60, 20, 4600, 2800, 2.039, 0.551, 1.000, 0.981, NULL, NULL, NULL, 2, 7, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (4, 40, '2017-04-03', '2017-03-30', '2017-07-31', '2017-05-25', 46, 39, 29, 17, 10, 1440, 1160, 1.560, 1.560, 0.000, 0.000, '', 0, '', 2, 4, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (109, 40, '2017-04-03', '2017-02-28', '2017-07-28', '2017-04-26', 257, 86, 66, 25, 20, 8640, 2640, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 56, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-05-15', 1);
INSERT INTO intervention VALUES (2, 40, '2017-04-03', '2017-03-30', '2017-07-31', '2017-05-25', 182, 104, 87, 47, 17, 6600, 3480, 5.220, 5.220, 0.000, 0.000, '', 0, '', 2, 2, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (110, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 107, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 56, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (116, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 55, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 59, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (3, 40, '2017-04-03', '2017-03-30', '2017-07-31', '2017-05-25', 83, 34, 29, 17, 5, 3120, 1160, 1.610, 1.610, 0.000, 0.000, NULL, NULL, NULL, 2, 3, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (5, 40, '2017-04-03', '2017-03-30', '2017-07-31', '2017-05-25', 217, 67, 54, 3, 13, 8200, 2160, 3.120, 3.120, 0.000, 0.000, '', 0, '', 2, 5, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (100, 40, '2017-04-18', '2017-04-28', '2017-08-04', '2017-06-28', 179, 76, 56, 4, 20, 6360, 2240, 3.400, 2.300, 0.000, 0.000, '', 0, '', 2, 51, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (101, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 79, 0, 0, 0, 0, 3160, 0, 4.860, 0.000, 0.000, 0.000, '', 0, '', 2, 51, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (6, 40, '2017-04-03', '2017-03-17', '2017-05-31', '2017-05-13', 285, 183, 145, 67, 38, 8680, 5800, 2.366, 0.975, 2.000, 2.360, NULL, NULL, NULL, 2, 6, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (17, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 215, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 6, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (18, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 90, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 7, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (21, 40, '2017-04-03', '2017-03-17', '2017-05-31', '2017-05-17', 87, 87, 71, 22, 16, 2840, 2840, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 9, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (22, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 87, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 9, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (23, 40, '2017-04-03', '2017-03-17', '2017-05-31', '2017-05-17', 141, 141, 125, 35, 16, 5000, 5000, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 10, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (24, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 164, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 10, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (25, 40, '2017-04-03', '2017-03-17', '2017-05-31', '2017-05-17', 181, 181, 172, 43, 9, 6880, 6880, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 11, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (26, 40, '2017-07-12', '2017-07-19', '2017-09-11', NULL, 202, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 11, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (27, 40, '2017-04-03', '2017-03-17', '2017-05-31', '2017-05-17', 177, 177, 148, 55, 29, 5920, 5920, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 12, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (29, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 205, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 12, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (31, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 45, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 13, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (117, 40, '2017-04-03', '2017-02-28', '2017-06-30', '2017-04-26', 117, 62, 44, 34, 18, 3800, 1760, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 60, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-12-05', 2);
INSERT INTO intervention VALUES (118, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 103, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 60, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (119, 40, '2017-04-03', '2017-02-28', '2017-06-30', '2017-04-26', 122, 91, 68, 15, 23, 4600, 2720, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 61, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-05-15', 2);
INSERT INTO intervention VALUES (120, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 101, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 61, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 7);
INSERT INTO intervention VALUES (121, 40, '2017-04-03', '2017-02-28', '2017-06-30', '2017-04-26', 68, 73, 66, 33, 7, 2560, 2640, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 62, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-05-11', 2);
INSERT INTO intervention VALUES (122, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 73, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 62, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 7);
INSERT INTO intervention VALUES (123, 40, '2017-04-03', '2017-02-28', '2017-06-30', '2017-04-26', 250, 162, 126, 55, 36, 8440, 5040, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 63, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-20', '2017-05-14', '2017-05-15', 2);
INSERT INTO intervention VALUES (124, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 221, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 63, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (126, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 66, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 64, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (127, 40, '2017-04-03', '2017-02-28', '2017-08-18', '2017-04-25', 90, 46, 39, 14, 7, 3320, 1560, 2.600, 2.000, 0.640, 0.640, '', 0, '', 1, 65, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-21', '2017-05-14', '2017-05-15', 8);
INSERT INTO intervention VALUES (128, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 59, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 65, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (32, 40, '2017-04-03', '2017-03-21', '2017-06-03', '2017-05-16', 132, 49, 39, 10, 10, 4880, 1560, 2.600, 1.740, 1.000, 1.000, '', 0, '', 2, 14, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (33, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 152, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 14, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (34, 40, '2017-04-03', '2017-03-24', '2017-08-18', '2017-05-17', 152, 72, 58, 29, 14, 5200, 2320, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 15, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (35, 40, '2017-07-17', '2017-07-18', '2017-11-09', NULL, 89, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 15, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (36, 40, '2017-04-03', '2017-03-24', '2017-08-18', '2017-05-17', 101, 73, 59, 22, 14, 2840, 2360, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 16, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (37, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 82, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 16, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (38, 40, '2017-04-03', '2017-03-24', '2017-08-18', '2017-05-17', 75, 45, 35, 13, 10, 2480, 1400, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 17, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (39, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 84, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 17, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (40, 40, '2017-04-03', '2017-03-24', '2017-08-18', '2017-05-17', 210, 50, 41, 8, 9, 6760, 1640, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 18, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (41, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 83, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 18, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (43, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 122, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 19, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (44, 40, '2017-04-18', '2017-05-01', '2017-06-30', '2017-06-24', 98, 48, 34, 15, 14, 3360, 1360, 1.830, 1.630, 0.000, 0.000, '', 0, '', 2, 20, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (45, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 76, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 20, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (46, 40, '2017-04-18', '2017-05-01', '2017-06-30', '2017-06-24', 75, 38, 36, 12, 2, 2560, 1440, 1.450, 1.450, 0.000, 0.000, '', 0, '', 2, 21, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (47, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 38, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 21, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (48, 40, '2017-04-18', '2017-05-01', '2017-06-30', '2017-06-24', 118, 83, 45, 11, 38, 3640, 1800, 3.010, 3.014, 0.000, 0.000, '', 0, '', 2, 22, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (49, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 83, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 22, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (50, 40, '2017-03-04', '2017-03-21', '2017-05-16', '2017-05-13', 83, 34, 26, 13, 8, 2960, 1040, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 23, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (51, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 54, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 23, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (52, 40, '2017-04-03', '2017-03-21', '2017-05-16', '2017-05-13', 101, 31, 27, 8, 4, 3880, 1080, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 24, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (53, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 37, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 24, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (54, 40, '2017-04-03', '2017-03-21', '2017-05-16', '2017-05-13', 272, 105, 82, 20, 23, 9480, 3280, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 25, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (99, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 28, 0, 0, 0, 0, 1120, 0, 0.000, 0.000, 0.000, 0.000, '', 1782, '', 2, 50, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (10, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 104, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 2, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (11, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 82, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 3, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (13, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 86, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 5, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (55, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 145, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 25, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (56, 40, '2017-04-03', '2017-03-21', '2017-05-16', '2017-05-13', 190, 156, 126, 30, 30, 6080, 5040, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 26, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (57, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 164, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 26, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (59, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 104, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 27, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (61, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 69, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 28, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (63, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 69, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 29, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (64, 40, '2017-04-03', '2017-03-15', '2017-05-31', '2017-05-16', 307, 114, 87, 11, 27, 11200, 3480, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 30, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (65, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 154, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 30, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (66, 40, '2017-04-03', '2017-03-15', '2017-05-31', '2017-05-16', 162, 132, 110, 66, 22, 4360, 4400, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 34, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (67, 40, '2017-07-17', '2017-07-18', '2017-09-11', NULL, 152, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 34, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (68, 40, '2017-04-03', '2017-03-14', '2017-09-29', '2017-05-10', 186, 42, 32, 12, 10, 6440, 1280, 1.184, 0.500, 0.000, 0.000, '', 0, '', 2, 35, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (69, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 66, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 35, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (71, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 219, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 36, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (72, 40, '2017-04-03', '2017-03-14', '2017-09-29', '2017-05-10', 102, 50, 39, 14, 11, 3600, 1560, 0.369, 0.150, 1.000, 1.000, '', 0, '', 2, 37, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (73, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 58, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 37, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (74, 40, '2017-04-03', '2017-03-14', '2017-09-29', '2017-05-10', 351, 207, 172, 96, 35, 12280, 6880, 7.096, 7.090, 1.000, 1.000, '', 0, '', 2, 38, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (75, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 58, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 38, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (76, 40, '2017-05-02', '2017-04-18', '2017-06-23', '2017-06-16', 100, 48, 43, 20, 5, 3840, 1720, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 39, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (77, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 48, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 39, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (78, 40, '2017-05-02', '2017-04-18', '2017-06-23', '2017-06-16', 127, 63, 49, 40, 14, 4240, 1960, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 40, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (79, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 63, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 40, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (80, 40, '2017-05-02', '2017-04-18', '2017-06-23', '2017-06-16', 165, 98, 72, 70, 26, 5080, 2880, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 41, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (81, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 98, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 41, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (82, 40, '2017-05-02', '2017-04-18', '2017-06-23', '2017-06-16', 220, 120, 100, 45, 20, 7680, 4000, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 42, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (8, 40, '2017-04-03', '2017-03-17', '2017-05-31', '2017-05-13', 126, 61, 49, 40, 12, 4560, 1960, 2.368, 2.400, 0.000, 0.000, NULL, NULL, NULL, 2, 8, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (30, 40, '2017-04-03', '2017-03-21', '2017-06-09', '2017-05-16', 181, 32, 26, 7, 6, 7000, 1040, 2.600, 1.360, 0.880, 0.880, '', 0, '', 2, 13, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (42, 40, '2017-04-18', '2017-05-01', '2017-06-30', '2017-06-24', 232, 122, 122, 51, 0, 8600, 4880, 5.650, 5.650, 0.000, 0.000, '', 0, '', 2, 19, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (58, 40, '2017-04-03', '2017-03-15', '2017-08-18', '2017-05-12', 197, 87, 69, 12, 18, 6560, 2760, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 27, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (70, 40, '2017-04-03', '2017-03-14', '2017-09-29', '2017-05-10', 416, 178, 139, 55, 39, 15160, 5560, 5.440, 5.440, 1.000, 1.000, '', 0, '', 2, 36, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (83, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 120, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 42, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (84, 40, '2017-05-02', '2017-04-18', '2017-06-23', '2017-06-16', 150, 76, 61, 35, 15, 5440, 2440, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 43, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (85, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 76, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 43, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (86, 40, '2017-04-18', '2017-04-18', '2017-09-15', '2017-06-16', 174, 133, 123, 69, 10, 6560, 4920, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 44, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (87, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 133, 0, 0, 0, 0, 0, 0, 5.560, 0.000, 0.000, 0.000, '', 0, '', 2, 44, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (88, 40, '2017-04-18', '2017-04-18', '2017-09-15', '2017-06-16', 123, 83, 68, 58, 4400, 2720, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 45, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (89, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 83, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 45, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (90, 40, '2017-04-18', '2017-04-18', '2017-09-15', '2017-06-16', 335, 159, 135, 100, 24, 12760, 5400, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 46, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (91, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 159, 0, 0, 0, 0, 0, 0, 6.300, 0.000, 0.000, 0.000, '', 0, '', 2, 46, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (92, 40, '2017-04-18', '2017-04-28', '2017-08-11', '2017-06-16', 242, 44, 35, 10, 9, 9160, 1400, 2.500, 2.000, 0.000, 0.000, '', 0, '', 2, 47, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (94, 40, '2017-04-18', '2017-04-18', '2017-08-11', '2017-06-24', 134, 46, 41, 11, 5, 5200, 1640, 3.000, 2.500, 0.000, 0.000, '', 0, '', 2, 48, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (95, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 46, 0, 0, 0, 0, 1840, 0, 0.000, 0.000, 0.000, 0.000, '', 6348, '', 2, 48, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (96, 40, '2017-04-18', '2017-04-28', '2017-08-11', '2017-06-24', 73, 44, 32, 10, 12, 2160, 1280, 0.840, 0.840, 1.710, 1.710, '', 0, '', 2, 49, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (97, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 62, 0, 0, 0, 0, 2480, 0, 0.000, 0.000, 0.000, 0.000, '', 2898, '', 2, 49, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (104, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 61, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 53, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 4);
INSERT INTO intervention VALUES (105, 40, '2017-04-03', '2017-03-14', '2017-06-30', '2017-05-10', 169, 98, 70, 32, 28, 5760, 2800, 0.840, 0.840, 1.710, 1.710, '', 0, '', 1, 54, NULL, 3, 1, 0, '2017-04-01', '2017-04-10', NULL, NULL, '2017-05-28', '2017-05-31', 1);
INSERT INTO intervention VALUES (134, 40, '2017-04-03', '2017-02-28', '2017-08-18', '2017-04-25', 209, 199, 184, 35, 15, 7760, 7360, 2.600, 1.600, 0.800, 0.800, '', 0, '', 1, 69, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-21', '2017-05-14', '2017-05-15', 8);
INSERT INTO intervention VALUES (12, 40, '2017-07-17', '2017-07-20', '2017-09-11', NULL, 44, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 4, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (129, 40, '2017-04-03', '2017-02-28', '2017-08-18', '2017-04-25', 138, 70, 57, 24, 13, 5000, 2280, 0.000, 0.000, 1.120, 1.120, '', 0, '', 1, 66, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-21', '2017-05-14', '2017-05-15', 8);
INSERT INTO intervention VALUES (130, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 86, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 66, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (131, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 125, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 67, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (132, 40, '2017-04-03', '2017-02-28', '2017-08-18', '42017-02-05', 143, 77, 55, 24, 22, 4840, 2200, 2.600, 1.800, 0.000, 0.000, '', 0, '', 1, 68, NULL, 3, 1, 0, '2017-03-18', '2017-03-13', '2017-04-12', '2017-04-21', '2017-05-14', '2017-05-15', 2);
INSERT INTO intervention VALUES (133, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 77, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 68, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (135, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 289, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 69, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (62, 40, '2017-04-03', '2017-03-15', '2017-08-15', '2017-05-12', 105, 57, 47, 17, 10, 3760, 1880, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 29, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (20, 40, '2017-07-17', '2017-07-19', '2017-09-11', NULL, 86, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0.000, '', 0, '', 1, 8, NULL, 4, 2, 0, '2017-08-04', NULL, '2017-08-24', NULL, '2017-09-30', NULL, 1);
INSERT INTO intervention VALUES (93, 40, '2017-07-17', '2017-07-17', '2017-09-11', NULL, 50, 0, 0, 0, 0, 2000, 0, 0.000, 0.000, 0.000, 0.000, '', 6250, '', 2, 47, NULL, 4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (60, 40, '2017-04-03', '2017-03-15', '2017-08-18', '2017-05-12', 174, 44, 35, 6, 9, 6880, 1400, 0.000, 0.000, 0.000, 0.000, '', 0, '', 2, 28, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO intervention VALUES (98, 40, '2017-04-18', '2017-04-28', '2017-06-28', '2017-06-28', 73, 28, 28, 27, 0, 2920, 1120, 3.400, 2.500, 0.000, 0.000, '', 0, '', 2, 50, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);


--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 188
-- Name: intervention_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('intervention_id_seq', 137, true);


--
-- TOC entry 2229 (class 0 OID 18527)
-- Dependencies: 209
-- Data for Name: interventionintitule; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO interventionintitule VALUES (1, 98, 2);
INSERT INTO interventionintitule VALUES (2, 98, 3);


--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 208
-- Name: interventionintitule_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('interventionintitule_id_seq', 2, true);


--
-- TOC entry 2227 (class 0 OID 18513)
-- Dependencies: 207
-- Data for Name: intitule; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO intitule VALUES (1, '-');
INSERT INTO intitule VALUES (2, 'DAE');
INSERT INTO intitule VALUES (3, 'RENFORCEMENT DE BERGES');
INSERT INTO intitule VALUES (4, 'DESENSABLEMENT');
INSERT INTO intitule VALUES (5, 'REHABILITATION BARRAGE TRADITIONNEL');
INSERT INTO intitule VALUES (6, 'MISE EN PLACE DE DISPOSITIF ANTI EROSIF');
INSERT INTO intitule VALUES (7, 'DESENSABLEMENT CANALISATION');
INSERT INTO intitule VALUES (8, 'REBOISEMENT');


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 206
-- Name: intitule_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('intitule_id_seq', 8, true);


--
-- TOC entry 2213 (class 0 OID 18257)
-- Dependencies: 193
-- Data for Name: nature; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 192
-- Name: nature_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('nature_id_seq', 1, false);


--
-- TOC entry 2225 (class 0 OID 18490)
-- Dependencies: 205
-- Data for Name: paiement; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO paiement VALUES (1, '2017-08-04', NULL, 98);
INSERT INTO paiement VALUES (2, '2017-08-24', NULL, 98);
INSERT INTO paiement VALUES (3, '2017-09-30', NULL, 98);


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 204
-- Name: paiement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paiement_id_seq', 3, true);


--
-- TOC entry 2215 (class 0 OID 18287)
-- Dependencies: 195
-- Data for Name: phase; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO phase VALUES (1, 'INIT');
INSERT INTO phase VALUES (2, 'RT');
INSERT INTO phase VALUES (3, 'RTX');
INSERT INTO phase VALUES (4, 'TR');
INSERT INTO phase VALUES (5, 'MPP');


--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 194
-- Name: phase_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('phase_id_seq', 5, true);


--
-- TOC entry 2201 (class 0 OID 18170)
-- Dependencies: 181
-- Data for Name: prestataire; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO prestataire VALUES (2, 'YMCA');
INSERT INTO prestataire VALUES (3, 'MIASA');
INSERT INTO prestataire VALUES (5, 'MITAFA');
INSERT INTO prestataire VALUES (7, 'NASANDRATRA');
INSERT INTO prestataire VALUES (8, 'ACDM');
INSERT INTO prestataire VALUES (1, 'TSINJOMEVA_NOMENIAVO_SECONDE_CHANCE');
INSERT INTO prestataire VALUES (4, 'VONJY_4');
INSERT INTO prestataire VALUES (6, 'ADID_JDM_VATOSOA');


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 180
-- Name: prestataire_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('prestataire_id_seq', 8, true);


--
-- TOC entry 2207 (class 0 OID 18194)
-- Dependencies: 187
-- Data for Name: terroir; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO terroir VALUES (3, 'MANANITRA', 1, 1, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 0, '', 0, NULL, NULL, NULL, NULL, '', 0, 0, '', 2, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (4, 'SOAMANANDRARINY', 1, 1, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (17, 'ANTANAMBAO', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 6, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (5, 'AMBATODIDY', 1, 1, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 0, '', 0, NULL, NULL, NULL, NULL, '', 0, 0, '', 4, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (18, 'ANDOHAFARIHY', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 3, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (6, 'AMBOHITOMPOINA', 1, 1, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 0, '', 0, NULL, NULL, NULL, NULL, '', 0, 0, '', 1, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (11, 'AMPITATAFIKA', 1, 1, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 0, '', 0, NULL, NULL, NULL, NULL, '', 0, 0, '', 8, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (15, 'MAHATSINJO', 1, 1, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 0, '', 0, NULL, NULL, NULL, NULL, '', 0, 0, '', 6, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (7, 'AMBATOLAHY', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 4, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (8, 'ANTAMBOHOMENA', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 5, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (2, 'AMBILONA', 1, 1, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 0, '', 0, NULL, NULL, NULL, NULL, '', 0, 0, '', 2, NULL, NULL, 1, 0, 0, 1);
INSERT INTO terroir VALUES (1, 'BELANITRA', 1, 1, 0, NULL, NULL, '', NULL, NULL, 2000, NULL, NULL, 5, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, '', NULL, NULL, 0, 30, '', 0, NULL, NULL, NULL, NULL, '', 0, 0, '', 1, 5, NULL, 1, 0, 0, 1);
INSERT INTO terroir VALUES (9, 'AMBATOMIADY', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 5, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (10, 'TSARAHONENANA', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 6, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (12, 'AMBOHIMANDROSO A', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 8, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (13, 'AMBATOTOKANA', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 7, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (14, 'AMBOHIKAMBANA', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 7, NULL, NULL, NULL, 0, 0, 1);
INSERT INTO terroir VALUES (16, 'ANTEMOTRA', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 6, NULL, NULL, NULL, 0, 0, 1);


--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 186
-- Name: terroir_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('terroir_id_seq', 21, true);


--
-- TOC entry 2220 (class 0 OID 18437)
-- Dependencies: 200
-- Data for Name: terroircp; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO terroircp VALUES (1, 1, 1);


--
-- TOC entry 2205 (class 0 OID 18186)
-- Dependencies: 185
-- Data for Name: unite; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO unite VALUES (1, '-');
INSERT INTO unite VALUES (2, 'ha');


--
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 184
-- Name: unite_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('unite_id_seq', 2, true);


--
-- TOC entry 2055 (class 2606 OID 18447)
-- Name: accesterroir_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY terroircp
    ADD CONSTRAINT accesterroir_pkey PRIMARY KEY (id);


--
-- TOC entry 2053 (class 2606 OID 18364)
-- Name: administration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY administration
    ADD CONSTRAINT administration_pkey PRIMARY KEY (id);


--
-- TOC entry 2037 (class 2606 OID 18183)
-- Name: agencepaiement_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY agencepaiement
    ADD CONSTRAINT agencepaiement_pkey PRIMARY KEY (id);


--
-- TOC entry 2051 (class 2606 OID 18353)
-- Name: chargeprojet_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY chargeprojet
    ADD CONSTRAINT chargeprojet_pkey PRIMARY KEY (id);


--
-- TOC entry 2057 (class 2606 OID 18468)
-- Name: chargeprojetinscription_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inscriptionchargeprojet
    ADD CONSTRAINT chargeprojetinscription_pkey PRIMARY KEY (id);


--
-- TOC entry 2027 (class 2606 OID 18138)
-- Name: commune_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY commune
    ADD CONSTRAINT commune_pkey PRIMARY KEY (id);


--
-- TOC entry 2033 (class 2606 OID 18167)
-- Name: dir_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dir
    ADD CONSTRAINT dir_pkey PRIMARY KEY (id);


--
-- TOC entry 2031 (class 2606 OID 18159)
-- Name: district_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY district
    ADD CONSTRAINT district_pkey PRIMARY KEY (id);


--
-- TOC entry 2029 (class 2606 OID 18146)
-- Name: fokotany_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY fokotany
    ADD CONSTRAINT fokotany_pkey PRIMARY KEY (id);


--
-- TOC entry 2045 (class 2606 OID 18249)
-- Name: groupetravail_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY groupetravail
    ADD CONSTRAINT groupetravail_pkey PRIMARY KEY (id);


--
-- TOC entry 2043 (class 2606 OID 18240)
-- Name: intervention_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY intervention
    ADD CONSTRAINT intervention_pkey PRIMARY KEY (id);


--
-- TOC entry 2063 (class 2606 OID 18532)
-- Name: interventionintitule_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY interventionintitule
    ADD CONSTRAINT interventionintitule_pkey PRIMARY KEY (id);


--
-- TOC entry 2061 (class 2606 OID 18518)
-- Name: intitule_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY intitule
    ADD CONSTRAINT intitule_pkey PRIMARY KEY (id);


--
-- TOC entry 2047 (class 2606 OID 18262)
-- Name: nature_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY nature
    ADD CONSTRAINT nature_pkey PRIMARY KEY (id);


--
-- TOC entry 2059 (class 2606 OID 18495)
-- Name: paiement_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY paiement
    ADD CONSTRAINT paiement_pkey PRIMARY KEY (id);


--
-- TOC entry 2049 (class 2606 OID 18292)
-- Name: phase_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY phase
    ADD CONSTRAINT phase_pkey PRIMARY KEY (id);


--
-- TOC entry 2035 (class 2606 OID 18175)
-- Name: prestataire_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY prestataire
    ADD CONSTRAINT prestataire_pkey PRIMARY KEY (id);


--
-- TOC entry 2041 (class 2606 OID 18202)
-- Name: terroir_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY terroir
    ADD CONSTRAINT terroir_pkey PRIMARY KEY (id);


--
-- TOC entry 2039 (class 2606 OID 18191)
-- Name: unite_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY unite
    ADD CONSTRAINT unite_pkey PRIMARY KEY (id);


--
-- TOC entry 2079 (class 2606 OID 18453)
-- Name: accesterroir_chargeprojet_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroircp
    ADD CONSTRAINT accesterroir_chargeprojet_id_fkey FOREIGN KEY (chargeprojet_id) REFERENCES chargeprojet(id);


--
-- TOC entry 2078 (class 2606 OID 18448)
-- Name: accesterroir_terroir_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroircp
    ADD CONSTRAINT accesterroir_terroir_id_fkey FOREIGN KEY (terroir_id) REFERENCES terroir(id);


--
-- TOC entry 2064 (class 2606 OID 18147)
-- Name: fokotany_commune_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY fokotany
    ADD CONSTRAINT fokotany_commune_fkey FOREIGN KEY (commune) REFERENCES commune(id);


--
-- TOC entry 2077 (class 2606 OID 18250)
-- Name: groupetravail_terroir_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY groupetravail
    ADD CONSTRAINT groupetravail_terroir_fkey FOREIGN KEY (terroir_id) REFERENCES terroir(id);


--
-- TOC entry 2073 (class 2606 OID 18271)
-- Name: intervention_groupetravail_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY intervention
    ADD CONSTRAINT intervention_groupetravail_fkey FOREIGN KEY (groupetravail_id) REFERENCES groupetravail(id);


--
-- TOC entry 2076 (class 2606 OID 18520)
-- Name: intervention_intitule_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY intervention
    ADD CONSTRAINT intervention_intitule_id_fkey FOREIGN KEY (intitule_id) REFERENCES intitule(id);


--
-- TOC entry 2074 (class 2606 OID 18280)
-- Name: intervention_nature_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY intervention
    ADD CONSTRAINT intervention_nature_fkey FOREIGN KEY (nature_id) REFERENCES nature(id);


--
-- TOC entry 2075 (class 2606 OID 18293)
-- Name: intervention_phase_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY intervention
    ADD CONSTRAINT intervention_phase_fkey FOREIGN KEY (phase_id) REFERENCES phase(id);


--
-- TOC entry 2072 (class 2606 OID 18266)
-- Name: intervention_uniteautreindic_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY intervention
    ADD CONSTRAINT intervention_uniteautreindic_fkey FOREIGN KEY (uniteautreindic) REFERENCES unite(id);


--
-- TOC entry 2081 (class 2606 OID 18533)
-- Name: interventionintitule_intervention_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY interventionintitule
    ADD CONSTRAINT interventionintitule_intervention_id_fkey FOREIGN KEY (intervention_id) REFERENCES intervention(id);


--
-- TOC entry 2082 (class 2606 OID 18538)
-- Name: interventionintitule_intitule_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY interventionintitule
    ADD CONSTRAINT interventionintitule_intitule_id_fkey FOREIGN KEY (intitule_id) REFERENCES intitule(id);


--
-- TOC entry 2080 (class 2606 OID 18506)
-- Name: paiement_intervention_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paiement
    ADD CONSTRAINT paiement_intervention_id_fkey FOREIGN KEY (intervention_id) REFERENCES intervention(id);


--
-- TOC entry 2070 (class 2606 OID 18228)
-- Name: terroir_agencepaiement_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroir
    ADD CONSTRAINT terroir_agencepaiement_fkey FOREIGN KEY (agencepaiement_id) REFERENCES agencepaiement(id);


--
-- TOC entry 2071 (class 2606 OID 18469)
-- Name: terroir_cp_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroir
    ADD CONSTRAINT terroir_cp_id_fkey FOREIGN KEY (cp_id) REFERENCES chargeprojet(id);


--
-- TOC entry 2065 (class 2606 OID 18203)
-- Name: terroir_dir_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroir
    ADD CONSTRAINT terroir_dir_fkey FOREIGN KEY (dir_id) REFERENCES dir(id);


--
-- TOC entry 2066 (class 2606 OID 18208)
-- Name: terroir_district_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroir
    ADD CONSTRAINT terroir_district_fkey FOREIGN KEY (district_id) REFERENCES district(id);


--
-- TOC entry 2067 (class 2606 OID 18213)
-- Name: terroir_prestataireagec_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroir
    ADD CONSTRAINT terroir_prestataireagec_fkey FOREIGN KEY (prestataireagec_id) REFERENCES prestataire(id);


--
-- TOC entry 2069 (class 2606 OID 18223)
-- Name: terroir_prestatairecible_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroir
    ADD CONSTRAINT terroir_prestatairecible_fkey FOREIGN KEY (prestatairecible_id) REFERENCES prestataire(id);


--
-- TOC entry 2068 (class 2606 OID 18218)
-- Name: terroir_prestataireplan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terroir
    ADD CONSTRAINT terroir_prestataireplan_fkey FOREIGN KEY (prestataireplan_id) REFERENCES prestataire(id);


--
-- TOC entry 2236 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-09-21 09:56:26

--
-- PostgreSQL database dump complete
--

