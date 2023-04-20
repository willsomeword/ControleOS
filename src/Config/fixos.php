<?php

#FUNÇÕES 
const CADASTRO_TIPO_EQUIPAMENTO = "CadastrarTipoEquipamento";
const ALTERAR_TIPO_EQUIPAMENTO = "AlterarTipoEquipamento";
const EXCLUIR_TIPO_EQUIPAMENTO = "ExcluirTipoEquipamento";

const CADASTRO_TIPO_SETOR ="CadastrarTipoSetor";
const ALTERAR_TIPO_SETOR = "AlterarTipoSetor";
const EXCLUIR_TIPO_SETOR ="ExcluirTipoSetor";

const CADASTRO_EQUIPAMENTO ="CadastrarEquipamento";
const ALTERAR_EQUIPAMENTO = "AlterarEquipamento";
const EXCLUIR_EQUIPAMENTO ="ExcluirEquipamento";
const ALOCAR_EQUIPAMENTO  ="AlocarEquipamento";
const REMOVER_EQUIPAMENTO_SETOR  ="RemoverEquipamento";

const CADASTRO_MODELO_EQUIPAMENTO ="CadastrarModelo";
const ALTERAR_MODELO_EQUIPAMENTO= "AlterarModelo";
const EXCLUIR_MODELO_EQUIPAMENTO ="ExcluirModelo";

#cadastro usuario
const CADASTRO_USUARIO = "CadastroUsuario";
const ALTERAR_USUARIO = "AlterarTipoEquipamento";
const MUDAR_STATUS = "MudarStatus";
const ATUALIZAR_SENHA = "MudarSenha";

#dados combo filtro

const FILTRO_TIPO = 1;
const FILTRO_MODELO = 2;
const FILTRO_IDENTIFICACAO = 3;
const FILTRO_DESCRICAO = 4;

#situacao de alocamento

const SITUACAO_ALOCADO = 1;
const SITUACAO_REMOVIDO = 2;
const SITUACAO_MANUTECAO = 3;

const PERFIL_ADM = 1;
const PERFIL_FUNCIONARIO = 2;
const PERFIL_TECNICO = 3;

#status
const STATUS_ATIVO = 1;
const STATUS_INATIVO = 0;

#chamado
const ABRIR_CHAMADO = "AbrirChamado";
const ATENDER_CHAMADO= "AtenderChamado";
const ENCERRAR_CHAMADO = "EncerrarChamado";
#situacao  do Atendimento
const SITUACAO_EM_ABERTO = 1;
const SITUACAO_EM_ATENDIMENTO = 2;
const SITUACAO_ENCERRADO = 3;
const SITUACAO_TODOS = 4;


#CHAVE SECRET TOKEN  OBS: PODE SER NOME QUALQUER
const SECRET_JWT_FUNC = 'secret';
const NAO_AUTORIZADO = -1000;




define('PATH_URL', $_SERVER["DOCUMENT_ROOT"] . '/ControleOs13h/src/');

  