
<h1>Prueba tecnica: factor enerigia</h1>

<h3>Resumen</h3>

Rest Api desarrollada con **Yii framework** para obtener datos desde [api.stackexchange.com](https://api.stackexchange.com)

<h3>Instalacion</h3>
 
Descargar el proycto desde el repositorio
 
`````
git clone https://github.com/etpro01/factor_energia.git [path/to/project]
`````

Ir a la carpeta del proyecto

`````
cd [path/to/project]
`````

Hacer un composer install

`````
composer install
`````

<h3>Uso</h3>

Se debe hacer una consulta get con los parametros permitidos

`````
http://[domain]/api/stackexchange/questions
`````

<h5>Parametros permitidos</h5>

Los parametros permitidos son los comentados en la documentacion de [api.stackexchange.com](https://api.stackexchange.com/docs/questions).

- [ ] **tagged** string
- [ ] **fromdate** date(Y-m-d)
- [ ] **todate** date(Y-m-d)
- [ ] **min**	date(Y-m-d)
- [ ] **max**	date(Y-m-d)
- [ ] **page**	number
- [ ] **pagesize** number
- [ ] **order** string (desc,asc) 
- [ ] **sort**	string (activity, votes, creation, hot, week, month)

<h3>Componente StackApp</h3>

Para el desarrollo de esta api desarrolle el componente `components/StackApp.php`. Este componente permite realizar la conexion con [api.stackexchange.com](https://api.stackexchange.com/docs/questions).

Los parametros son manejados de manera dinamica por el componente por lo que agregara todos los parametros del get como parametros de la consulta a la api [api.stackexchange.com](https://api.stackexchange.com/docs/questions)

Este componente puede ser escalable con el metodo `setSection()`, utilizando otras secciones de la api [api.stackexchange.com](https://api.stackexchange.com/docs/questions) como _answers_, _articles_, _comments_ y otros.


<h2>Prueba</h2> 

Recursos Humanos 
 
Prueba técnica IT – Programador/a Fullstack 
 
Desarrollo de un a API de consulta de datos de Stack Overflow. 
 Desarrolla un a API REST en PHP utilizando uno de los siguientes frameworks: 
o Yii2. 
o Symfony. 
o Laravel. 
 
 Debe desarrollar un endpoint que permita obtener datos de las preguntas de los foros 
de Stack Overflow utilizando la siguiente API publica: 
https://api.stackexchange.com/docs/questions 
 
 Esta API publica permite filtrar por varios campos. El endpoint debe tener varios filtros: 
o Tagged: Filtro obligatorio. 
o Todate: Filtro opcional. 
o Fromdate: Filtro opcional. 
 
 Entréganos la API en un repositorio de GitHub. 

 
1) Tiempo estimado para desarrollar la prueba técnica: 2/3 hs. 
2) Tiempo máximo de entrega 7 días, desde la recepción de la misma. 
3) Todos los candidatos que hayan presentado la prueba técnica recibirán un feedback de 
nuestro equipo IT, en agradecimiento al tiempo prestado. 
 

