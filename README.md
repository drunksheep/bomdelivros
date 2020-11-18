
# Bom de Livros

  

Front-end baseado no [Personal Boilerplate](https://github.com/drunksheep/personal-boilerplate)
Back-end baseado em [Wordpress](https://wordpress.org/).

### Features do front-end
**Usar dentro da pasta do tema**

- Minificadores/Nanificadores/Transpiladores (gulp-terser, babel, cssnano, autoprefixer) , de CSS e JS, baseados na pasta ***/src***

- CSS Reset, Guia de hierarquia css (dentro da pasta ****/src/stylus****), princípio de um framework nos arquivos ****repeatables.styl**** (regras gerais de tamanho de grid) e ****spacing.styl**** (grid system básico com larguras predefinidas) .

- Estrutura para fácil utilização de libs de JS através da gulpfile e adição de módulos postCSS (sem suporte a ES6 modules por enquanto).

### Como rodar:

    npm install

  

Vai instalar todas as dependências, recomendo também rodar os comandos:

    npm update

  e caso falhas de segurança sejam encontradas, rode também o 
  

    npm audit fix
    
**Funções:**

    gulp

Roda a gulp task default (inicia compilação do stylus e transpilação do babel, cria e minifica arquivos de css e js na pasta ****/dist**** e observa os arquivos da ****/src****

    gulp js // Babel, Concat, Terse.
Faz apenas a parte do JS.

    gulp css // Stylus, post css modules.
   
Faz apenas a parte do CSS

Se você precisar de orientação, fale comigo no [GitHub]('https://github.com/drunksheep') ou [E-mail](mailto:andre3facchini@gmail.com)