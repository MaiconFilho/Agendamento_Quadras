# Sistema de Agendamento de Quadras

Sistema desenvolvido em CodeIgniter 4 para gerenciamento de agendamentos de quadras esportivas, com controle de usuários, tipos de quadras e horários disponíveis.

## Instalação e Configuração

### 1. Clone o Repositório
```bash
git clone [URL_DO_REPOSITORIO]
cd TrabProgIII

Obs: é crucial que esteja na pasta que contém os arquivos do sistema, e não na pasta pai, pois não irá funcionar.
```

### 2. Instale as Dependências
```bash
composer install
```

### 3. Configure o Ambiente
```bash
# Copie o arquivo de ambiente
cp env .env

# Edite o arquivo .env com suas configurações
```

### 4. Configure o Banco de Dados

Edite o arquivo `.env` com suas configurações de banco:

```env
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------
CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------
database.default.hostname = localhost
database.default.database = AppointmentsCourts
database.default.username = postgres
database.default.password = postgres
database.default.DBDriver = Postgre
database.default.port = 5432
```

### 5. Crie o Banco de Dados
```sql
-- No PostgreSQL, execute:
CREATE DATABASE "AppointmentsCourts";

Rode o script do banco de dados presente na pasta do projeto.
```

### 6. Inicie o Servidor de Desenvolvimento
```bash
php spark serve
```

O sistema estará disponível em: `http://localhost:8080`

## Funcionalidades do Sistema

### Sistema de Autenticação

#### Login
- **Rota**: `/auth`
- **Campos**: E-mail e senha
- **Validação**: Verifica credenciais no banco de dados
- **Redirecionamento**: Para dashboard após login bem-sucedido

#### Logout
- **Rota**: `/auth/logout`
- **Funcionalidade**: Destrói a sessão e redireciona para login

### Gerenciamento de Usuários

#### Listagem de Usuários
- **Rota**: `/user`
- **Acesso**: Apenas usuários logados
- **Funcionalidades**:
  - Visualizar todos os usuários cadastrados
  - Exibir tipo de usuário (Cliente/Administrador)
  - Botões para editar e excluir usuários

#### Criar Usuário
- **Rota**: `/user/create`
- **Acesso**: Apenas administradores
- **Campos**:
  - ID (texto)
  - Nome (texto)
  - Senha (password)
  - E-mail (email)
  - Tipo (combobox: Cliente/Administrador)
  - Data de Criação (date)

#### Editar Usuário
- **Rota**: `/user/edit/{id}`
- **Acesso**: Apenas administradores

#### Excluir Usuário
- **Rota**: `/user/delete/{id}`
- **Acesso**: Apenas administradores

#### Registro Público
- **Rota**: `/user/register`
- **Acesso**: Público (sem login)
- **Funcionalidades**:
  - Registro de novos usuários
  - Tipo automaticamente definido como "Cliente" (0)
  - Campo tipo bloqueado para edição
  - Redirecionamento para login após registro

### Gerenciamento de Quadras

#### Listagem de Quadras
- **Rota**: `/court`
- **Acesso**: Usuários logados

#### Criar Quadra
- **Rota**: `/court/create`
- **Acesso**: Apenas administradores

#### Editar Quadra
- **Rota**: `/court/edit/{id}`
- **Acesso**: Apenas administradores

#### Excluir Quadra
- **Rota**: `/court/delete/{id}`
- **Acesso**: Apenas administradores

### Tipos de Quadra

#### Listagem de Tipos
- **Rota**: `/courttype`
- **Acesso**: Usuários logados

#### Gerenciamento Completo
- Criar, editar e excluir tipos de quadra
- Acesso restrito a administradores

### Vínculos Quadra-Tipo

#### Listagem de Vínculos
- **Rota**: `/courttypelink`
- **Acesso**: Usuários logados

#### Gerenciamento
- Criar, editar e excluir vínculos
- Acesso restrito a administradores

### Sistema de Agendamentos

#### Listagem de Agendamentos
- **Rota**: `/scheduling`
- **Acesso**: Usuários logados

#### Criar Agendamento
- **Rota**: `/scheduling/create`
- **Acesso**: Usuários logados

#### Editar Agendamento
- **Rota**: `/scheduling/edit/{id}`
- **Acesso**: Usuários logados

#### Excluir Agendamento
- **Rota**: `/scheduling/delete/{id}`
- **Acesso**: Usuários logados

### Dashboard

#### Página Principal
- **Rota**: `/dashboard`
- **Acesso**: Usuários logados
- **Funcionalidades**:
  - Menu de navegação
  - Acesso rápido às funcionalidades
  - Informações do usuário logado

## Controle de Acesso

### Tipos de Usuário
- **0 - Cliente**: Acesso básico ao sistema
- **1 - Administrador**: Acesso completo a todas as funcionalidades

## Tecnologias Utilizadas

- **Backend**: CodeIgniter 4 (PHP 8.1+)
- **Frontend**: HTML5, CSS3, Bootstrap 5.3
- **Banco de Dados**: PostgreSQL
- **Gerenciador de Dependências**: Composer
