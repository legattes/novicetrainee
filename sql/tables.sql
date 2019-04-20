--
CREATE TABLE estudante(
  estudante_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(250) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  senha VARCHAR(40) NOT NULL,
  sexo CHAR NOT NULL,
  data_nasc DATE NOT NULL,
  estado_civil VARCHAR(20) NOT NULL
);

--
CREATE TABLE instituicao(
  instituicao_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL
);

--
CREATE TABLE estudante_instituicao (
  estudante_id BIGINT NOT NULL,
  instituicao_id BIGINT NOT NULL,
  RA BIGINT NOT NULL,
  curso VARCHAR(50) NOT NULL,
  semestre INT(2) NOT NULL,
  escolaridade VARCHAR(30) NOT NULL,
  periodo VARCHAR(15) NOT NULL
);

--
CREATE TABLE empresa(
  empresa_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  cnpj VARCHAR(20) NOT NULL,
  nome_fantasia VARCHAR(255) NOT NULL,
  razao_social VARCHAR(255) NOT NULL,
  senha VARCHAR(45) NOT NULL
);

--
CREATE TABLE vagas (
  vaga_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  empresa_id BIGINT NOT NULL,
  curso VARCHAR(45) NOT NULL,
  semestre INT(2) NOT NULL,
  escolaridade VARCHAR(30) NOT NULL,
  area_atuacao VARCHAR(50) NOT NULL,
  remuneracao INT(10) NOT NULL,
  periodo VARCHAR(20) NOT NULL,
  vaga_status VARCHAR(2) NOT NULL DEFAULT 1
);

--
CREATE TABLE prova(
  prova_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  vaga_id BIGINT NOT NULL
);

--
CREATE TABLE prova_pergunta(
  prova_id BIGINT NOT NULL,
  pergunta_id BIGINT NOT NULL
);

--
CREATE TABLE pergunta(
  pergunta_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  texto VARCHAR(250) NOT NULL
);

--
CREATE TABLE resposta(
  resposta_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  texto VARCHAR(250) NOT NULL
);

--
CREATE TABLE pergunta_resposta(
  pergunta_id BIGINT NOT NULL,
  resposta_id BIGINT NOT NULL,
  correta BOOLEAN NOT NULL
);

--
CREATE TABLE vagas_requisitos(
  vaga_id BIGINT NOT NULL,
  conhecimento_id BIGINT NOT NULL,
  proficiencia VARCHAR(20) NOT NULL
);

--
CREATE TABLE vagas_beneficios(
  vaga_id BIGINT NOT NULL,
  beneficio VARCHAR(250) NOT NULL
);

--
CREATE TABLE estudante_vaga(
  estudante_id BIGINT NOT NULL,
  vaga_id BIGINT NOT NULL
);

--
CREATE TABLE conhecimento(
  conhecimento_id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL
);

--
CREATE TABLE estudante_conhecimento(
  estudante_id BIGINT NOT NULL,
  conhecimento_id BIGINT NOT NULL,
  proficiencia VARCHAR(20) NOT NULL
);

ALTER TABLE estudante_conhecimento ADD CONSTRAINT fk_estudante_id_at_estudante_conhecimento FOREIGN KEY (estudante_id) REFERENCES estudante(estudante_id);
ALTER TABLE estudante_conhecimento ADD CONSTRAINT fk_conheciment_id_at_estudante_conhecimento FOREIGN KEY (conhecimento_id) REFERENCES conhecimento(conhecimento_id);

ALTER TABLE estudante_vaga ADD CONSTRAINT fk_estudante_id_at_estudante_vaga FOREIGN KEY (estudante_id) REFERENCES estudante(estudante_id);
ALTER TABLE estudante_vaga ADD CONSTRAINT fk_vaga_id_at_estudante_vaga FOREIGN KEY (vaga_id) REFERENCES vagas(vaga_id);

ALTER TABLE estudante_instituicao ADD CONSTRAINT fk_estudante_id_at_estudante_instituicao FOREIGN KEY (estudante_id) REFERENCES estudante(estudante_id);
ALTER TABLE estudante_instituicao ADD CONSTRAINT fk_instituicao_id_at_estudante_instituicao FOREIGN KEY (instituicao_id) REFERENCES instituicao(instituicao_id);

ALTER TABLE vagas ADD CONSTRAINT fk_empresa_id_at_vagas FOREIGN KEY (empresa_id) REFERENCES empresa(empresa_id);

ALTER TABLE vagas_requisitos ADD CONSTRAINT fk_vaga_id_at_vagas_requisitos FOREIGN KEY (vaga_id) REFERENCES vagas(vaga_id);
ALTER TABLE vagas_requisitos ADD CONSTRAINT fk_conhecimento_id_at_vagas_requisitos FOREIGN KEY (conhecimento_id) REFERENCES conhecimento(conhecimento_id);

ALTER TABLE vagas_beneficios ADD CONSTRAINT fk_vaga_id_at_vagas_beneficios FOREIGN KEY (vaga_id) REFERENCES vagas(vaga_id);

ALTER TABLE pergunta_resposta ADD CONSTRAINT fk_pergunta_id_at_pergunta_resposta FOREIGN KEY (pergunta_id) REFERENCES pergunta(pergunta_id);
ALTER TABLE pergunta_resposta ADD CONSTRAINT fk_resposta_id_at_pergunta_resposta FOREIGN KEY (resposta_id) REFERENCES resposta(resposta_id);

ALTER TABLE prova_pergunta ADD CONSTRAINT fk_pergunta_id_at_prova_pergunta FOREIGN KEY (pergunta_id) REFERENCES pergunta(pergunta_id);
ALTER TABLE prova_pergunta ADD CONSTRAINT fk_prova_id_at_prova_pergunta FOREIGN KEY (prova_id) REFERENCES prova(prova_id);

ALTER TABLE prova ADD CONSTRAINT fk_vaga_id_at_prova FOREIGN KEY (prova_id) REFERENCES vagas(vaga_id);