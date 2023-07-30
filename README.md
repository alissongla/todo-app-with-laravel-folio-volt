# Todo App
 - Este projeto é um exemplo de uma aplicação de lista de tarefas, onde é possível adicionar, remover e marcar como concluída uma tarefa.
 - A ideia deste projeto é aplicar a utilização do laravel folio e do laravel volt.

## Instalação
  - Para instalar o projeto, basta clonar o repositório e executar o comando `composer install` para instalar as dependências do projeto.
  - Executar o comando `npm install && npm run build` para instalar as dependências do projeto.
  - Executar o comando `php artisan key:generate` para gerar a chave da aplicação.
  - Executar o comando `php artisan volt:install && php artisan folio:install` para publicar os arquivos do folio e do volt.
  - Após isso, é necessário criar um arquivo `.env` na raiz do projeto, copiando o conteúdo do arquivo `.env.example` e alterando as configurações de banco de dados.
  - Após isso, é necessário executar o comando `php artisan migrate` para criar as tabelas no banco de dados.
  - Por fim, basta executar o comando `php artisan serve` para iniciar o servidor e acessar a aplicação.

## Referências
Este projeto foi desenvolvido com base no artigo:
 - [Todo Application With Laravel Folio and Volt](https://nunomaduro.com/todo_application_with_laravel_folio_and_volt)
