# Sistema de Rifa

## Descrição
Este é um sistema de rifa simples desenvolvido com **HTML**, **Bootstrap**, **Jquery** e **PHP**. Ele permite gerenciar sorteios e listas de participantes, com funcionalidades para criar, editar e excluir pessoas.

## Funcionalidades
- **Gerenciamento de Participantes:**
  - Adicionar novos participantes à lista.
  - Editar informações dos participantes cadastrados.
  - Remover participantes.

- **Sorteio Automático:**
  - Realizar sorteios de forma aleatória entre os participantes cadastrados.
  - Exibir o vencedor do sorteio.

- **Interface Amigável:**
  - Interface responsiva e intuitiva.
  - Visualização clara da lista de participantes e dos resultados dos sorteios.
# Resultado


https://github.com/user-attachments/assets/640d6bb1-c0b1-4d33-b615-5d2ef6524f8f


## Tecnologias Utilizadas
- **Frontend:**
  - HTML5
  - Bootstrap
  - Jquery

- **Backend:**
  - PHP (para lógica de negócio e manipulação de dados)
  
- **Banco de Dados:**
  - MySQL para armazenamento de participantes e resultados

Preview

## Pré-requisitos
Para executar este projeto, você precisará de:
- Servidor Web  Apache (XAMP).
- PHP.
- Banco de Dados MySQL.
- Navegador atualizado.

## Como Configurar o Projeto
1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/sistema-de-rifa.git

2.Configuração do Banco de Dados:

- Crie um banco de dados MySQL chamado rifa.
- Importe o arquivo SQL que cria a tabela tabela e popula com alguns dados iniciais (se necessário). Exemplo de comando SQL para criação da tabela:
   ```SQL
   CREATE TABLE tabela (
    numero INT PRIMARY KEY,
    nome VARCHAR(255),
    situacao VARCHAR(255)
  );
   
3.Configuração do Servidor Web:
- Coloque o projeto na raiz do seu servidor web (por exemplo, em /var/www/html para servidores Apache).
- Certifique-se de que o servidor está configurado para executar PHP corretamente.

4.Arquivo de Configuração (config.php):

- No arquivo config.php, insira as credenciais de acesso ao seu banco de dados MySQL:
 ``` <?php
  $server = "localhost:3306";
  $username = "root"; // Usuário do banco de dados
  $password = ""; // Senha do banco de dados
  $dbname = "rifa"; // Nome do banco de dados
  
  // Conexão com o banco de dados
  $conn = new mysqli($server, $username, $password, $dbname);
  
  // Verifica se houve erro na conexão
  if ($conn->connect_error) {
      die("Conexão falhou: " . $conn->connect_error);
  }
  ?>
```
5. Executando o Sistema:

- Abra o navegador e acesse http://localhost/sistema-de-rifa ou o caminho onde você colocou o projeto.
- Agora você pode adicionar, editar e excluir participantes, além de realizar sorteios.

## **Contato**
Se você tiver dúvidas, sugestões ou feedback, entre em contato:

  <a href="mailto:rflfranchini@gmail.com" target="_blank"><img alt="Gmail" height="40px" width="40px" src="https://img.icons8.com/color/48/gmail--v1.png"/><a> 
  <a href="https://www.instagram.com/rafael_franchini/" target="_blank"><img alt="Instagram" height="40px" width="40px" src="https://img.icons8.com/fluency/48/instagram-new.png"/></a>
  <a href="https://www.linkedin.com/in/rafael-franchini-37b0a21a4/" target="_blank"><img alt="LinkedIn" height="40px" width="40px" src="https://img.icons8.com/fluency/48/linkedin.png"/></a>

