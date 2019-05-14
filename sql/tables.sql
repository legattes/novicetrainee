CREATE TABLE estudante(
  estudante_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(250) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  senha VARCHAR(40) NOT NULL,
  sexo CHAR NOT NULL,
  data_nasc DATE NOT NULL,
  estado_civil VARCHAR(20) NOT NULL
);

CREATE TABLE instituicao(
  instituicao_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL
);

CREATE TABLE empresa(
  empresa_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  cnpj VARCHAR(20) NOT NULL,
  nome_fantasia VARCHAR(255) NOT NULL,
  razao_social VARCHAR(255) NOT NULL,
  senha VARCHAR(45) NOT NULL
);

CREATE TABLE curso(
  curso_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(250) NOT NULL
);

CREATE TABLE vaga(
  vaga_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  empresa_id BIGINT NOT NULL,
  nome VARCHAR(250) NOT NULL,  
  curso_id BIGINT NOT NULL,
  semestre INT(2) NOT NULL,
  remuneracao INT(10) NOT NULL,
  periodo VARCHAR(20) NOT NULL,
  vaga_status VARCHAR(2) NOT NULL DEFAULT 1,

  CONSTRAINT fk_empresa_id_at_vaga FOREIGN KEY (empresa_id) REFERENCES empresa(empresa_id),
  CONSTRAINT fk_curso_id_at_vaga FOREIGN KEY (curso_id) REFERENCES curso(curso_id)
);

CREATE TABLE prova(
  prova_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  vaga_id BIGINT NOT NULL,

  CONSTRAINT fk_vaga_id_at_prova FOREIGN KEY (vaga_id) REFERENCES vaga(vaga_id)
);

CREATE TABLE pergunta(
  pergunta_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  texto VARCHAR(250) NOT NULL
);

CREATE TABLE resposta(
  resposta_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  texto VARCHAR(250) NOT NULL
);

CREATE TABLE contato(
  contato_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(200) NOT NULL,
  celular VARCHAR(20),
  telefone VARCHAR(20)
);

CREATE TABLE endereco(
  endereco_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  cidade VARCHAR(250) NOT NULL,
  estado VARCHAR(2) NOT NULL,
  cep VARCHAR(10) NOT NULL,
  bairro VARCHAR(100) NOT NULL,
  rua VARCHAR(200) NOT NULL,
  numero VARCHAR(10) NOT NULL,
  complemento VARCHAR(250)
);

CREATE TABLE estudante_instituicao (
  estudante_id BIGINT NOT NULL,
  instituicao_id BIGINT NOT NULL,
  RA BIGINT NOT NULL,
  curso_id BIGINT NOT NULL,
  semestre INT(2) NOT NULL,
  periodo VARCHAR(15) NOT NULL,

  CONSTRAINT pk_estudante_instituicao PRIMARY KEY (estudante_id, instituicao_id),
  CONSTRAINT fk_estudante_id_at_estudante_instituicao FOREIGN KEY (estudante_id) REFERENCES estudante(estudante_id),
  CONSTRAINT fk_instituicao_id_at_estudante_instituicao FOREIGN KEY (instituicao_id) REFERENCES instituicao(instituicao_id),
  CONSTRAINT fk_curso_id_at_estudante_instituicao FOREIGN KEY (curso_id) REFERENCES curso(curso_id)
);

CREATE TABLE estudante_vaga(
  estudante_id BIGINT NOT NULL,
  vaga_id BIGINT NOT NULL,

  CONSTRAINT pk_estudante_vaga PRIMARY KEY(estudante_id, vaga_id),
  CONSTRAINT fk_estudante_id_at_estudante_vaga FOREIGN KEY (estudante_id) REFERENCES estudante(estudante_id),
  CONSTRAINT fk_vaga_id_at_estudante_vaga FOREIGN KEY (vaga_id) REFERENCES vaga(vaga_id)
);

CREATE TABLE estudante_endereco(
  estudante_id BIGINT NOT NULL,
  endereco_id BIGINT NOT NULL,

  CONSTRAINT pk_estudante_endereco PRIMARY KEY(estudante_id, endereco_id),
  CONSTRAINT fk_estudante_id_at_estudante_endereco FOREIGN KEY (estudante_id) REFERENCES estudante(estudante_id),
  CONSTRAINT fk_endereco_id_at_estudante_endereco FOREIGN KEY (endereco_id) REFERENCES endereco(endereco_id)
);

CREATE TABLE empresa_endereco(
  empresa_id BIGINT NOT NULL,
  endereco_id BIGINT NOT NULL,

  CONSTRAINT pk_empresa_id_endereco PRIMARY KEY(empresa_id, endereco_id),
  CONSTRAINT fk_estudante_id_at_empresa_endereco FOREIGN KEY (empresa_id) REFERENCES empresa(empresa_id),
  CONSTRAINT fk_endereco_id_at_empresa_endereco FOREIGN KEY (endereco_id) REFERENCES endereco(endereco_id)
);

CREATE TABLE estudante_contato(
  estudante_id BIGINT NOT NULL,
  contato_id BIGINT NOT NULL,


  CONSTRAINT pk_estudante_contato PRIMARY KEY(estudante_id, contato_id),
  CONSTRAINT fk_estudante_id_at_estudante_contato FOREIGN KEY (estudante_id) REFERENCES estudante(estudante_id),
  CONSTRAINT fk_contato_id_at_estudante_contato FOREIGN KEY (contato_id) REFERENCES contato(contato_id)
);

CREATE TABLE empresa_contato(
  empresa_id BIGINT NOT NULL,
  contato_id BIGINT NOT NULL,

  CONSTRAINT pk_empresa_contato PRIMARY KEY(empresa_id, contato_id),
  CONSTRAINT fk_estudante_id_at_empresa_contato FOREIGN KEY (empresa_id) REFERENCES empresa(empresa_id),
  CONSTRAINT fk_contato_id_at_empresa_contato FOREIGN KEY (contato_id) REFERENCES contato(contato_id)
);

CREATE TABLE prova_pergunta(
  prova_id BIGINT NOT NULL,
  pergunta_id BIGINT NOT NULL,

  CONSTRAINT fk_pergunta_id_at_prova_pergunta FOREIGN KEY (pergunta_id) REFERENCES pergunta(pergunta_id),
  CONSTRAINT fk_prova_id_at_prova_pergunta FOREIGN KEY (prova_id) REFERENCES prova(prova_id)
);

CREATE TABLE pergunta_resposta(
  pergunta_id BIGINT NOT NULL,
  resposta_id BIGINT NOT NULL,
  correta BOOLEAN NOT NULL,
  
  CONSTRAINT fk_pergunta_id_at_pergunta_resposta FOREIGN KEY (pergunta_id) REFERENCES pergunta(pergunta_id),
  CONSTRAINT fk_resposta_id_at_pergunta_resposta FOREIGN KEY (resposta_id) REFERENCES resposta(resposta_id)
);

CREATE TABLE prova_estudante(
  prova_id BIGINT NOT NULL,
  estudante_id BIGINT NOT NULL,
  pergunta_id BIGINT NOT NULL,
  resposta_id BIGINT NOT NULL,
  
  CONSTRAINT fk_prova_id_at_prova_estudante FOREIGN KEY (prova_id) REFERENCES prova (prova_id),
  CONSTRAINT fk_estudante_id_at_prova_estudante FOREIGN KEY (estudante_id) REFERENCES estudante (estudante_id),
  CONSTRAINT fk_pergunta_id_at_prova_estudante FOREIGN KEY (pergunta_id) REFERENCES pergunta (pergunta_id),
  CONSTRAINT fk_resposta_id_at_prova_estudante FOREIGN KEY (resposta_id) REFERENCES resposta (resposta_id)  
);

CREATE TABLE prova_token(
  prova_id BIGINT NOT NULL,
  estudante_id BIGINT NOT NULL,
  token VARCHAR(50) NOT NULL,
  validade BOOLEAN NOT NULL,

  CONSTRAINT fk_prova_id_at_prova_token FOREIGN KEY (prova_id) REFERENCES prova (prova_id),
  CONSTRAINT fk_estudante_id_at_prova_token FOREIGN KEY (estudante_id) REFERENCES estudante (estudante_id)
);