USE clinicontrol;

INSERT INTO cargo
(descricao, profissionalSaude, tipoRegistro)
VALUES
('Médico(a)', 1, 'CRM'),
('Dentista', 1, 'CRO'),
('Enfermeiro(a)', 1, 'COREN'),
('Nutricionista', 1, 'CRN'),
('Fisioterapeuta', 1, 'CREFITO'),
('Terapeuta Ocupacional', 1, 'CREFITO'),
('Psicólogo(a)', 1, 'CRP'),
('Personal Trainer', 1, 'CREF'),
('Secretário(a)', 0, '');

INSERT INTO tipoProcedimento
(descricao)
VALUES
('Consulta'),
('Exame'),
('Cirurgia'),
('Observação');

INSERT INTO endereco
(cep, logradouro, numero, complemento, cidade, estado)
VALUES
('96077010', 'Rua Alberto Pimentel', 317, '', 'Pelotas', 'RS'),
('96020000', 'Rua General Osório', 1000, '', 'Pelotas', 'RS'),
('96015280', 'Rua General Neto', 2000, '', 'Pelotas', 'RS'),
('96015140', 'Avenida Bento Gonçalves', 3000, '', 'Pelotas', 'RS'),
('96085000', 'Avenida Ferreira Viana', 4000, '', 'Pelotas', 'RS');

INSERT INTO usuario
(email, nomeUsuario, senha, nivel, nome, sobrenome, cpf, dataNasc, ativo, idEndereco)
VALUES
('thalesccastro@gmail.com', 'cineasthales', '81f02fef0747541d21012a0a138598d2', 3, 'Thales', 'Castro', '80606784004', '1989-06-24', 1, 1),
('igor@gmail.com', 'igor', '81f02fef0747541d21012a0a138598d2', 0, 'Igor', 'Silva', '11122233344', '1995-01-01', 1, 2),
('felipe@gmail.com', 'felipe', '81f02fef0747541d21012a0a138598d2', 1, 'Felipe', 'Theil', '55566677788', '1997-02-02', 1, 3),
('joao@gmail.com', 'joao', '81f02fef0747541d21012a0a138598d2', 1, 'João', 'das Neves', '11122233345', '1998-03-03', 1, 4),
('maria@gmail.com', 'maria', '81f02fef0747541d21012a0a138598d2', 2, 'Maria', 'das Graças', '11122233346', '1999-04-04', 1, 5);

INSERT INTO empregado
(salario, registro, idCargo, idUsuario)
VALUES
(1000.00, '12345', 1, 3),
(2000.00, '', 9, 4),
(0, '23432', 2, 5);

INSERT INTO procedimento
(data, hora, descricao, receita, valor, realizado, idTipoProcedimento, idPaciente, idProfissional)
VALUES
('2017-10-10', '10:00', 'Tosse, febre, mucosa nasal.', 'Xarope Vick', 200.00, 1, 1, 2, 3),
('2017-10-11', '11:00', 'Remoção de sisos superiores.', '', 100.00, 1, 3, 2, 4),
('2017-10-12', '16:00', '', '', 250.00, 0, 1, 2, 5);

INSERT INTO empresa
(razaoSocial, nomeFantasia, cnpj, ativo)
VALUES
('Maria Medicina S/A', 'Clínica Avenida', '11111111111111', 1),
('John Richard Ltda.', 'Clínica Gaúcha Dentistas', '22222222222222', 1);

INSERT INTO local
(descricao, ativo, idEmpresa, idEndereco)
VALUES
('Sede Pelotas', 1, 1, 2),
('Matriz', 1, 2, 3);

INSERT INTO convenio
(nome, cnpj, ativo)
VALUES
('Unimed', '33333333333333', 1),
('IPERGS', '12345678901234', 1),
('PrevPel', '89214412444037', 1);

INSERT INTO adicional
(descricao, valor)
VALUES
('Vale Transporte', 100.00),
('Vale Alimentação', 200.00);

INSERT INTO usuario_convenio
(idUsuario, idConvenio)
VALUES
(2, 1),
(2, 2);

INSERT INTO especialidade
(descricao)
VALUES
('Clínico(a) Geral'),
('Cirurgião Dentista'),
('Ortodontista'),
('Oftalmologista'),
('Ginecologista'),
('Pediatra'),
('Otorrinolaringologista'),
('Neurologista'),
('Alergista');

INSERT INTO empregado_especialidade
(idEmpregado, idEspecialidade)
VALUES
(1, 1),
(2, 2),
(3, 5);

INSERT INTO telefone
(numero)
VALUES
('53999887766'),
('53999112233'),
('53999445566');

INSERT INTO empregado_local
(idLocal, idEmpregado)
VALUES
(1, 1),
(1, 2),
(2, 3);

INSERT INTO usuario_telefone
(idUsuario, idTelefone)
VALUES
(2, 1),
(3, 2),
(4, 3);

INSERT INTO empregado_adicional
(idEmpregado, idAdicional)
VALUES
(1, 1),
(2, 2);

INSERT INTO administrador
(idEmpregado, idEmpresa)
VALUES
(2, 2),
(3, 1);

INSERT INTO telefoneLocal
(numero, idLocal)
VALUES
('5332229988', 1),
('5332974215', 2);
