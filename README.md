## Inicie Educação
### Teste API REST utilzando o framework Laravel.
#### Objetivo:
<p>Consumir API Externa https://gorest.co.in, conforme os requisitos informados</p>

#### Clone Projeto:
<p>git clone https://github.com/ricardochomicz/inicie-api.git</p>

### Plataforma Teste API
<p>Postman</p>
<hr>

### CRUD
#### Criação novo usuário
#### post public/v2/users
##### body request
<ul>
<li>name</li>
<li>email</li>
<li>gender</li>
<li>status</li>
</ul>
<p>return id usuário</p>
<hr>

### Lista todos os usuários
#### get public/v2/users
<hr>

#### Retorna usuário cadastrado
#### get public/v2/users/{id}
<hr>

#### Cria um novo post para o usuário cadastrado
#### post public/v2/posts/
##### body request
<ul>
<li>user_id</li>
</ul>
<p>return id post</p>
<hr>

#### Cria um comentário para o post criado
#### post public/v2/comments/
##### body request
<ul>
<li>post_id</li>
</ul>
<hr>

#### Cria um comentário na lista pública
#### post public/v2/todos/
##### body request
<ul>
<li>user_id</li>
</ul>
<hr>

#### Apaga o comentário criado acima (lista pública)
#### delete public/v2/todos/{id}

