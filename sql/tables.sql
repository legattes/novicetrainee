CREATE TABLE estudante(
  estudante_id BIGINT NOT NULL,
  nome VARCHAR(250) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  senha VARCHAR(40) NOT NULL,
  sexo CHAR NOT NULL,
  data_nasc DATE NOT NULL,
  estado_civil VARCHAR(20) NOT NULL
)

CREATE TABLE instituicao(
  instituicao_id BIGINT NOT NULL,
  nome VARCHAR(255) NOT NULL
)

CREATE TABLE estudante_instituicao (
  estudante_id BIGINT NOT NULL,
  instituicao_id BIGINT NOT NULL,
  RA BIGINT NOT NULL,
  curso VARCHAR(50) NOT NULL,
  semestre INT(2) NOT NULL,
  escolaridade VARCHAR(30) NOT NULL,
  periodo VARCHAR(15) NOT NULL
)

CREATE TABLE empresa(
  empresa_id BIGINT NOT NULL,
  cnpj VARCHAR(20) NOT NULL,
  nome_fantasia VARCHAR(255) NOT NULL,
  razao_social VARCHAR(255) NOT NULL,
  senha VARCHAR(45) NOT NULL
)

CREATE TABLE vagas (
  vaga_id BIGINT NOT NULL,
  empresa_id BIGINT NOT NULL,
  curso VARCHAR(45) NOT NULL,
  semestre INT(2) NOT NULL,
  escolaridade VARCHAR(30) NOT NULL,
  area_atuacao VARCHAR(50) NOT NULL,
  remuneracao INT(10) NOT NULL,
  periodo VARCHAR(20) NOT NULL,
  teste VARCHAR(255) NOT NULL,
)

CREATE TABLE vagas_requisitos(
  vaga_id BIGINT NOT NULL,
  requisito VARCHAR(100) NOT NULL,
  proficiencia VARCHAR(20) NOT NULL,
)

CREATE TABLE vagas_beneficios(
  vaga_id BIGINT NOT NULL,
  beneficio VARCHAR(250) NOT NULL
)