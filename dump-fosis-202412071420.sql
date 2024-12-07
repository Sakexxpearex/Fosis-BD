PGDMP  2                    |           fosis    17rc1    17rc1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            �           1262    25309    fosis    DATABASE     x   CREATE DATABASE fosis WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Chile.1252';
    DROP DATABASE fosis;
                     postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                     pg_database_owner    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                        pg_database_owner    false    4            Y           1247    25334    estado    DOMAIN     �   CREATE DOMAIN public.estado AS text
	CONSTRAINT estado_check CHECK ((VALUE = ANY (ARRAY['Aceptado'::text, 'Rechazado'::text])));
    DROP DOMAIN public.estado;
       public               postgres    false    4            R           1247    25320    tipo_postulante    DOMAIN     �   CREATE DOMAIN public.tipo_postulante AS text
	CONSTRAINT tipo_postulante_check CHECK ((VALUE = ANY (ARRAY['Persona'::text, 'Familia'::text, 'Comunidad'::text, 'Organizacion'::text])));
 $   DROP DOMAIN public.tipo_postulante;
       public               postgres    false    4            �            1259    25328    postulacion    TABLE     �   CREATE TABLE public.postulacion (
    id integer NOT NULL,
    estado public.estado NOT NULL,
    region character varying NOT NULL,
    ciudad character varying NOT NULL,
    fecha date NOT NULL,
    rut_postulante integer
);
    DROP TABLE public.postulacion;
       public         heap r       postgres    false    4    857            �            1259    25310 
   postulante    TABLE     �   CREATE TABLE public.postulante (
    rut integer NOT NULL,
    nombre character varying NOT NULL,
    telefono integer NOT NULL,
    direccion character varying NOT NULL,
    tipo public.tipo_postulante NOT NULL
);
    DROP TABLE public.postulante;
       public         heap r       postgres    false    4    850            �          0    25328    postulacion 
   TABLE DATA           X   COPY public.postulacion (id, estado, region, ciudad, fecha, rut_postulante) FROM stdin;
    public               postgres    false    218   t       �          0    25310 
   postulante 
   TABLE DATA           L   COPY public.postulante (rut, nombre, telefono, direccion, tipo) FROM stdin;
    public               postgres    false    217   �       /           2606    25332    postulacion postulacion_pk 
   CONSTRAINT     X   ALTER TABLE ONLY public.postulacion
    ADD CONSTRAINT postulacion_pk PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.postulacion DROP CONSTRAINT postulacion_pk;
       public                 postgres    false    218            -           2606    25318    postulante postulante_pk 
   CONSTRAINT     W   ALTER TABLE ONLY public.postulante
    ADD CONSTRAINT postulante_pk PRIMARY KEY (rut);
 B   ALTER TABLE ONLY public.postulante DROP CONSTRAINT postulante_pk;
       public                 postgres    false    217            0           2606    25359 %   postulacion postulacion_postulante_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.postulacion
    ADD CONSTRAINT postulacion_postulante_fk FOREIGN KEY (rut_postulante) REFERENCES public.postulante(rut);
 O   ALTER TABLE ONLY public.postulacion DROP CONSTRAINT postulacion_postulante_fk;
       public               postgres    false    217    4653    218            �   7   x�3��tLN-(IL��t��W bN��<�Prf~����������9g�W� {�U      �   6   x�3246�4666���/JO�4�074707�t,*J,U�H-*��K����� �s     