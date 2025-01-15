<p align="center">
  <a href="https://roots.io/radicle/">
    <img alt="Radicle" src="https://cdn.roots.io/app/uploads/logo-radicle.svg" height="100">
  </a>
</p>

<p align="center">Radicle is a WordPress stack from Roots</p>

<p align="center">
  <a href="https://roots.io/radicle/">Website</a> &nbsp;&nbsp; <a href="https://roots.io/radicle/docs/installation/">Documentation</a> &nbsp;&nbsp; <a href="https://github.com/roots/radicle/releases">Releases</a> &nbsp;&nbsp; <a href="https://discourse.roots.io/c/radicle">Community</a>
</p>

## Server requirements

- Your document root must be configurable (_most_ local development tools and webhosts should support this)
- PHP >= 8.2 with the following extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, Tokenizer, XML
- Composer
- WP-CLI

### Local development

<details>
  <summary>⚙️ Other</summary>
  <br>

1. In `bud.config.js`: Replace `http://radicle.test` with your local dev server URL
1. Run `yarn && yarn build`
1. Run `composer install`
1. Configure your local development setup to set the `public/` directory as the webroot.
1. Copy `.env.example` to `.env` and update the [environment variables](https://roots.io/bedrock/docs/installation/#getting-started)

</details>

### Deploying Radicle

<details>
  <summary>⚙️ Other</summary>
  <br>

You will need to make sure that your deployment process handles the following:

1. Set .htaccess in root of server to serve public/
1. Run `git fetch` on the server (public_html)
1. Run `git pull` on the server (public_html)
1. Run `yarn && yarn build` from the project root
1. Copy contents of `public/dist/` folder to server (produced from `yarn build`)
1. Run `composer install`
1. Run `wp acorn optimize`
1. Run `wp acorn icons:cache` (if using Blade Icons)

</details>
