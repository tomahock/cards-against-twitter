# Cards Against The Humanity Twitter Bot

A Bot that twits random cards against the humanity cards!

## Deploying

```sh
$ git clone https://github.com/tomahock/cards-against-twitter # or clone your own fork
$ cd cards-against-twitter
$ heroku create
$ git push heroku master
$ heroku addons:create heroku-postgresql:hobby-dev
$ heroku run src/Lib/setup.php
$ heroku addons:add scheduler:standard
$ heroku addons:open scheduler
```

## Configuration
#### Heroku Config Variables (self-explanatory!)

```
DATABASE_NAME
DATABASE_USER
DATABASE_PW
DATABASE_HOST
DATABASE_PORT
TWITTER_OAUTH_ACCESS_TOKEN
TWITTER_OAUTH_ACCESS_TOKEN_SECRET
TWITTER_OAUTH_CONSUMER_KEY
TWITTER_OAUTH_CONSUMER_SECRET
```

## Boilerplate / Libs / Cards
https://cardsagainsthumanity.com/
https://github.com/lumilux/cards-against-humanity
https://github.com/heroku/php-getting-started.git
https://github.com/J7mbo/twitter-api-php

## Licence
The MIT License

Copyright (c) 2015 Tomahock. https://tomahock.com

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

___
Made with ♥ by [Tomahock](https://tomahock.com)

