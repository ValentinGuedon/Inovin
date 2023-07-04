# Project 3 - Starter Kit - Symfony

## Presentation

This starter kit is here to easily start a repository for Wild Code School students.

It's symfony website-skeleton project with some additional library (webpack, fixtures) and tools to validate code standards.

* GrumPHP, as pre-commit hook, will run 2 tools when `git commit` is run :

    * PHP_CodeSniffer to check PSR12
    * PHPStan focuses on finding errors in your code (without actually running it)
  If tests fail, the commit is canceled and a warning message is displayed to developper.

* Github Action as Continuous Integration will be run when a branch with active pull request is updated on github. It will run :

    * Tasks to check if vendor, .idea, env.local are not versionned,

## Getting Started for Students

### Prerequisites

1. Check composer is installed
2. Check yarn & node are installed

### Install

1. Clone this project
2. Run `composer install`
3. Run `yarn install`
4. Run `yarn encore dev` to build assets

### Working

1. Run `symfony server:start` to launch your local php web server
2. Run `yarn run dev --watch` to launch your local server for assets (or `yarn dev-server` do the same with Hot Module Reload activated)

### Testing

1. Run `php ./vendor/bin/phpcs` to launch PHP code sniffer
2. Run `php ./vendor/bin/phpstan analyse src --level max` to launch PHPStan
4. Run `./node_modules/.bin/eslint assets/js` to launch ESLint JS linter

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command:

`git config --global core.autocrlf true`

The `.editorconfig` file in root directory do this for you. You probably need `EditorConfig` extension if your IDE is VSCode.

### Run locally with Docker

1. Fill DATABASE_URL variable in .env.local file with
`DATABASE_URL="mysql://root:password@database:3306/<choose_a_db_name>"`
2. Install Docker Desktop an run the command:
```bash
docker-compose up -d
```
3. Wait a moment and visit http://localhost:8000


## Deployment

Some files are used to manage automatic deployments (using tools as Caprover, Docker and Github Action). Please do not modify them.

* [Dockerfile](/Dockerfile) Web app configuration for Docker container
* [docker-entry.sh](/docker-entry.sh) shell instruction to execute when docker image is built
* [nginx.conf](/ginx.conf) Nginx server configuration
* [php.ini](/php.ini) Php configuration


## Built With

* [Symfony](https://github.com/symfony/symfony)
* [GrumPHP](https://github.com/phpro/grumphp)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHPStan](https://github.com/phpstan/phpstan)
* [ESLint](https://eslint.org/)
* [Sass-Lint](https://github.com/sasstools/sass-lint)



## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning


## Authors

Wild Code School trainers team

## License

MIT License

Copyright (c) 2019 aurelien@wildcodeschool.fr

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

## Acknowledgments


```
032023-PHP-SXB-innovin
├─ .editorconfig
├─ .env
├─ .env.test
├─ .eslintrc.yml
├─ .git
│  ├─ COMMIT_EDITMSG
│  ├─ config
│  ├─ description
│  ├─ FETCH_HEAD
│  ├─ HEAD
│  ├─ hooks
│  │  ├─ applypatch-msg.sample
│  │  ├─ commit-msg
│  │  ├─ commit-msg.sample
│  │  ├─ fsmonitor-watchman.sample
│  │  ├─ post-update.sample
│  │  ├─ pre-applypatch.sample
│  │  ├─ pre-commit
│  │  ├─ pre-commit.sample
│  │  ├─ pre-merge-commit.sample
│  │  ├─ pre-push.sample
│  │  ├─ pre-rebase.sample
│  │  ├─ pre-receive.sample
│  │  ├─ prepare-commit-msg.sample
│  │  ├─ push-to-checkout.sample
│  │  └─ update.sample
│  ├─ index
│  ├─ info
│  │  └─ exclude
│  ├─ logs
│  │  ├─ HEAD
│  │  └─ refs
│  │     ├─ heads
│  │     │  ├─ animationFicheProfil
│  │     │  ├─ dev
│  │     │  ├─ ficheMailing
│  │     │  ├─ ficheProfil
│  │     │  ├─ fix
│  │     │  ├─ fixPHPCS
│  │     │  ├─ main
│  │     │  └─ remasterFiche
│  │     ├─ remotes
│  │     │  └─ origin
│  │     │     ├─ animationFicheProfil
│  │     │     ├─ dev
│  │     │     ├─ ficheProfil
│  │     │     ├─ fix
│  │     │     ├─ fixPHPCS
│  │     │     ├─ HEAD
│  │     │     └─ remasterFiche
│  │     └─ stash
│  ├─ objects
│  │  ├─ 00
│  │  │  ├─ 33a65d046fb74eab284d3a9a131a685620eb55
│  │  │  └─ 92ebf5b40046ef01036735b7cc88bf671e91f1
│  │  ├─ 01
│  │  │  ├─ 38e2c878cbf71dab0e6a581af74bd0e230f0bb
│  │  │  └─ c09242d655d6cf5cc7580da0dc35b031ecf822
│  │  ├─ 02
│  │  │  ├─ a413f6bf20105cd87b419f9dab80cabcf62e35
│  │  │  └─ d79d160d7a3982fd9bb0e8ab6cd99982d080fe
│  │  ├─ 03
│  │  │  └─ dc726c1a2f5b4e305d7ca241277849321a1467
│  │  ├─ 04
│  │  │  ├─ cf7e67111d34b858f208fa784fc58dc1e28c04
│  │  │  └─ f43b2348292c1e1d48585929eac30aa7432d74
│  │  ├─ 07
│  │  │  └─ 9567b8ee380a89e06dbc4eed41da56887109ed
│  │  ├─ 0a
│  │  │  ├─ 7031b0ecbf11c79b4ecca190d7527be6baadad
│  │  │  └─ b8c0d2e06c6290776ac40fccae08eac2fecfb3
│  │  ├─ 0b
│  │  │  ├─ 2f8afb4f528652e7605f104fad128867de470d
│  │  │  └─ 63de91824d5edd660f8ed285dce6156bd08186
│  │  ├─ 0c
│  │  │  ├─ 273cb30dcd41d4b8e9c45dcb5f713e429f3ece
│  │  │  └─ af50edc2e58e194c67263669f982cd880c66b5
│  │  ├─ 0e
│  │  │  ├─ 06bdb7710a02d6d5ac898f9fddc2d5bd3cd843
│  │  │  ├─ af548b3e912ed4c03b592e80f95e0c89ea1f96
│  │  │  └─ cadd2ccb728062b8e719bfc2e189e59d582f59
│  │  ├─ 0f
│  │  │  └─ c63705aae2ad907c85be3142fd83dea444c9f4
│  │  ├─ 11
│  │  │  ├─ 0827899ce8e12b9dd7e757f15ea121a218638c
│  │  │  └─ 5eb99077e5349dd2336e9442daf63a3940e9e6
│  │  ├─ 12
│  │  │  └─ b466a07c8b30ea1d67265fc374808a65b05685
│  │  ├─ 16
│  │  │  └─ 378f28edd5fbb2d3ffa21f1c7e8c5568619d5d
│  │  ├─ 17
│  │  │  └─ 895d2b1574b5afe033c419e0e99018e8ef1947
│  │  ├─ 19
│  │  │  ├─ 105bb91ebab71166205a82c4bc87010a4a3987
│  │  │  └─ 2c0e8c343fa1f1e44e5c68cfb8a9a18ed442c8
│  │  ├─ 1a
│  │  │  └─ 2ee6e302edc0f7338f761cbedd311de1151c23
│  │  ├─ 1b
│  │  │  └─ 3588cc63394678bd565b56aa968ec44d4cad1b
│  │  ├─ 1d
│  │  │  └─ b6603b2f9828f1a08d79f3e1ae409ecfee6fd4
│  │  ├─ 20
│  │  │  └─ 762be8bc3ac06dc3dd8fbf2787c3b9b0628c47
│  │  ├─ 21
│  │  │  ├─ 25dcfefa8a27a0a8909c6709146267acc26e21
│  │  │  └─ 2a505dde5f01fe33af088c8775b6672ae5e378
│  │  ├─ 23
│  │  │  └─ 8d40af40f0cf46c25da74c16238578a3213735
│  │  ├─ 24
│  │  │  ├─ 5ee39dfbc3899575205045b3e6be3001e2298f
│  │  │  ├─ 695cdc47b832c19095375fe2bb2baabb518377
│  │  │  ├─ 6ac63066973a6cb6718e2003ba89b31997f349
│  │  │  └─ e18183bbce2568e35bc15a1b05d554019993f2
│  │  ├─ 25
│  │  │  └─ cf02c0554a37f891601738a0a86852632e5874
│  │  ├─ 27
│  │  │  ├─ c31d7f27a0e2298a7e3f51acd027122d73a8a8
│  │  │  └─ c3d25dfb0985c0a815349300ab4f14f1014902
│  │  ├─ 28
│  │  │  ├─ 0752a3d1db68864c13117f144c1a4fc4322ac8
│  │  │  ├─ 56b24d7fd47126187ba1172058db2125030fda
│  │  │  ├─ 68f64fecb26dd0bd26eefe7dcc89f889f69c2d
│  │  │  └─ b20f0551229911114105622f87a4058f306578
│  │  ├─ 29
│  │  │  ├─ 95ab53513a89f81cfc3cd15a6f794c597d0c67
│  │  │  └─ d78467f209f6b45fb31d6133fb311b8b988ff8
│  │  ├─ 2a
│  │  │  ├─ 026633c83f606593d99d017c867f993be61f48
│  │  │  └─ 7f1e9b38594a5fd805459c1f9258dae389b450
│  │  ├─ 2c
│  │  │  └─ c2880c60d816ed8c7a33de45b632c0d9b7d53a
│  │  ├─ 2d
│  │  │  └─ 8aa8bb9fc77863c2edf56f3a850aaad1249574
│  │  ├─ 2e
│  │  │  └─ f3a294ce44a800238c688f7a889e0b12e0eebf
│  │  ├─ 30
│  │  │  ├─ 45ea83b7d8ecf3cd019c06f14d30fcc907e4e0
│  │  │  └─ 567f794205e83cdfaccb9161662fa1584aab8f
│  │  ├─ 31
│  │  │  ├─ 029acff9d606acff57a2e77c99942dfdcd2d20
│  │  │  └─ bc510e7f955a276bf7f495a876281b66dc0ccb
│  │  ├─ 32
│  │  │  └─ 11abb851987c306e47c46a5c43928e35c88ee4
│  │  ├─ 34
│  │  │  └─ fef71c70279fea815708aaf8c2b9c248428774
│  │  ├─ 35
│  │  │  ├─ 93208c16ba38f5cd7a11b13330a91ee9f78a83
│  │  │  ├─ abc9a500fc9b2e87d0bdb83330f1a1da2e2dde
│  │  │  └─ d7d13cb8ed29de5d3dce6d13ac9e57eb8e5684
│  │  ├─ 36
│  │  │  ├─ 679f04cf7b96cdb9932eca2ce28b781c4cde14
│  │  │  └─ f5a9b827a10f62481a708eee4c790679be9f55
│  │  ├─ 37
│  │  │  ├─ 29e13ce4b42776586dbf4df830097bfd93a50d
│  │  │  ├─ 8b29e5ef0df87c669b75ab59aa66530df318b0
│  │  │  └─ df98b21bc381ac0dc5825a1a6a8b9397e3c93e
│  │  ├─ 38
│  │  │  ├─ 587077b47410dc20a39f82c229d6a575adf588
│  │  │  └─ 6f34141dbaaec868fd23fbc2058f53307f1ec8
│  │  ├─ 3a
│  │  │  ├─ 1e9993281f46b082b09e38afac88af32860f53
│  │  │  └─ dd9847cd3b61385249d604633d30cb201bb175
│  │  ├─ 3c
│  │  │  └─ 6061740ef0b3c3e1a306b6009958ec0249b290
│  │  ├─ 3d
│  │  │  ├─ 4df20f83b21bd5b9fbeb7bf79a8d7fbde1771e
│  │  │  └─ 82c8fbf3e25b473417bba51fe8c5a592afc372
│  │  ├─ 3e
│  │  │  ├─ 7dc46cae380d44a4374925bda22c887b9faf79
│  │  │  ├─ bc93f6d06607be796a059a855c41bb07c728ac
│  │  │  └─ d2168429026d07eed20e25158116e4e7a1693e
│  │  ├─ 3f
│  │  │  └─ 2a802250cc34eb86d597d6bf6d620ed669f543
│  │  ├─ 42
│  │  │  ├─ 4661edcf107b72c7883a60a3715f625cf7bcb9
│  │  │  └─ 586bf145789e4a60854a6bed02e57f2f65d31a
│  │  ├─ 43
│  │  │  └─ 12cbd7e7e74181246cee850423dbd4fdb47ddd
│  │  ├─ 44
│  │  │  ├─ 6b36e3be4642874f12963f31b1ef3d0364c82b
│  │  │  └─ dea61769169504c33043791e9e2f5c8ce8797f
│  │  ├─ 46
│  │  │  └─ 29f689cf3b20130a72353a366a116e3e3fd51f
│  │  ├─ 47
│  │  │  └─ c726d058f5ee7098cbbb2f8f2dfd9635a12eea
│  │  ├─ 49
│  │  │  └─ 771b3dac488f22980c29f172ef0e12a4232272
│  │  ├─ 4a
│  │  │  ├─ 0772a42e62d68e0a6d6c1c97b649215c5462f7
│  │  │  └─ 40807ccb94c7a1cea9516ab8a11637de49eca0
│  │  ├─ 4b
│  │  │  ├─ 9f178916693b76c12706912961afd66ae7a656
│  │  │  ├─ b789931af6664559059c94558f671a168ec0f8
│  │  │  └─ e23e97a1e68dcb1ab176e5a8a71c781016f8ea
│  │  ├─ 4d
│  │  │  ├─ 00ba5e80b1399d8b3303b8a0edc2f974fa76cf
│  │  │  ├─ 5951ec272710ff833f5e92b856f7a4a61e4f5a
│  │  │  └─ 8a71a183022adfcff48800ee97d4519316933e
│  │  ├─ 4e
│  │  │  ├─ 3218c4c2ec06fc11e53941ffe2b008a7582d71
│  │  │  └─ 990e7e2e276228eeb61465df378863bef7c8c9
│  │  ├─ 4f
│  │  │  └─ 2467372fec66a35879330e1b9d033359ba0572
│  │  ├─ 50
│  │  │  └─ 63ef96588c256ba6821aa3b1a7f5e01b7ff905
│  │  ├─ 52
│  │  │  └─ 82b534a03caa68a52e783b37b8d50e2cd2cc1b
│  │  ├─ 53
│  │  │  └─ c7586f2349144e2bc8f539f3f1c4954d3a8b06
│  │  ├─ 56
│  │  │  └─ 1c591cac1b52f20813b8b94588bb9a9ba3816e
│  │  ├─ 57
│  │  │  └─ aad294959ef9afad954d355d3d8fe66d1b6e45
│  │  ├─ 59
│  │  │  ├─ ad04893131a29de2a55f78f0e0acbe4e76ae59
│  │  │  └─ b97925bac9b20a3fbf93a43c73e1aa4af05b82
│  │  ├─ 5a
│  │  │  └─ 041df0e2272994ff610231879c50d0f166786d
│  │  ├─ 5b
│  │  │  └─ e3757fca349a2cf708d448b77116874a6309cf
│  │  ├─ 5c
│  │  │  ├─ 3ec2ed23c4085f7e2081f5f5aef1e51cf5f550
│  │  │  ├─ 8edafb81361a9309bcf9e6966ee88e1e09b649
│  │  │  └─ e99ff6ed930f6c793bbae9d49a7c1f8c7c00f4
│  │  ├─ 5d
│  │  │  ├─ 1aee4a235c2ba1a7c72a847e408ac514b0dc2d
│  │  │  └─ a9d85466ffb181a4283537836f342332711618
│  │  ├─ 5e
│  │  │  └─ df537a8f94b8c402c00a2779d2126d07c5208f
│  │  ├─ 5f
│  │  │  └─ 70c41e77edc4dd3448fd38dd2d9ac8091a0607
│  │  ├─ 60
│  │  │  ├─ 1f2b4145e5d8ea9bbe736e30b4abb4f3827c13
│  │  │  ├─ 3145f2db87e5033e1473071b4eebd5c5cdad89
│  │  │  ├─ db260f3541d4c56925ca3d2028cb052f910c36
│  │  │  └─ e0b903c46b8a5da778b7ad73b80e79fb8661e2
│  │  ├─ 61
│  │  │  └─ 072187bdc96fd85c9edf3b0b8bef2c7e51d537
│  │  ├─ 62
│  │  │  ├─ 1a5881dde58fb255efb0aac26f9d2f19bfd12a
│  │  │  ├─ 3a950beb9be3f6cff11b3b8178dec3d78a49c5
│  │  │  └─ d4b7d2b1df5ce2c14ff800f915ad233dd90fd3
│  │  ├─ 63
│  │  │  └─ d1fde31958671618dcf873bfe53590a81e4239
│  │  ├─ 64
│  │  │  ├─ 3d164b7d3ccb32e3dc68122a2f51660de8c8c7
│  │  │  └─ 924df0a546d5f3496f0835e12f0b30bb2b4bd2
│  │  ├─ 65
│  │  │  └─ 8f7aa94f1c7e975b8ec2548478b0d1acd32187
│  │  ├─ 66
│  │  │  ├─ 73e0ef97853f035ca8a92562b4bd766fdccab8
│  │  │  ├─ 8e6e099f37605874cdc8881a5a2983ac7fc486
│  │  │  └─ c9204986e50ee0ddfc08d79a024ef3bc65aefa
│  │  ├─ 67
│  │  │  ├─ 0065e7a491eaa8c4d1804808e6d46b55262607
│  │  │  ├─ 08171298f7fd36a4f011d2d66fd9487cdd77cb
│  │  │  ├─ 3ddbdfb9c334297bad602cc8f76f66b8f66708
│  │  │  └─ 49db79718937e6388546e750b85a00a3c83707
│  │  ├─ 68
│  │  │  └─ 4b023723eef3e7aab14215442864582604f80c
│  │  ├─ 69
│  │  │  ├─ 2d2927ed035b847ee463a21bd39f431036bc70
│  │  │  ├─ 66929f037ce0a652adf28b9c633971c5236432
│  │  │  └─ 80a9d79529099f2ef51761301d22d1bb503eac
│  │  ├─ 6b
│  │  │  ├─ 1d9e5df1b303c0d9376a7a99b6543de044c42b
│  │  │  └─ 3d352fd622c6cb2bb522554c75899efa5580b7
│  │  ├─ 6c
│  │  │  └─ d950e2d0511d0a6aa7aa9ab70a5a53fdb0be8b
│  │  ├─ 6d
│  │  │  └─ 7d0048363bc01eb7426e4168a924b9199701ba
│  │  ├─ 6e
│  │  │  ├─ 4c891609fdb32e0b5dd4b7585d9791713215ae
│  │  │  └─ f854c179a5cbc0f746b42bd8f0321e5dcf30cd
│  │  ├─ 6f
│  │  │  └─ ecb1d9feec581b66a24398964ff11409ad2733
│  │  ├─ 70
│  │  │  └─ 5562a76df0884bdc4aa56a015ed848d797334d
│  │  ├─ 71
│  │  │  └─ a6d888dbc9bed8caccc0231b306d96e6bd2999
│  │  ├─ 72
│  │  │  └─ 5acc3a7a59df4c83cd5ea405c2b4eed7c6b107
│  │  ├─ 73
│  │  │  └─ d6f560ab2bc9763d272a9eeac1d2692e86adb8
│  │  ├─ 74
│  │  │  ├─ 1350d1bd3cee080fcb6adca4b05b7c197e3115
│  │  │  └─ 8c852056f379e95f2564e727b37e50577f5d9c
│  │  ├─ 76
│  │  │  └─ e6dbdc8d98a70e20dced62cd80e7177ce8e2ba
│  │  ├─ 79
│  │  │  └─ 8eb77472c6cdbb288448eda0592eaadc5db553
│  │  ├─ 7a
│  │  │  └─ 06a6527ebb750a25d2435d25a1ee1ff600fa37
│  │  ├─ 7b
│  │  │  └─ 83600bade952abc27433499cd64432813875a8
│  │  ├─ 7c
│  │  │  ├─ 3d8761229843eac4797bdd938ade87a4fe13ff
│  │  │  ├─ 56bd487e2312c5d9c475241bc41e8a266bfc27
│  │  │  ├─ 7d87bebf71826a3aed3d8638d80b2268c589b3
│  │  │  └─ bb8ee62cdd57bc1f0312089294e14b2f9c3931
│  │  ├─ 7d
│  │  │  └─ a2e6a726d6a7f317f9b92527d542e008ba7a3e
│  │  ├─ 80
│  │  │  ├─ 1a30d1c9ddfac70051ba30b97b186fb17f1aeb
│  │  │  └─ a85382572cfa5d26952fad7a4bbcbed4ba4583
│  │  ├─ 81
│  │  │  └─ dbfbbe26d8f856a38a6354f2cd3ebf99118245
│  │  ├─ 82
│  │  │  ├─ 783185d53372fca5aefdfde0a562997edc7b56
│  │  │  └─ f05eda32c9126dcadfc87f8513cf1a047c9bca
│  │  ├─ 83
│  │  │  ├─ 6a177c42bb1e7aaeb79fa5be7a929ce4c55974
│  │  │  ├─ ab7607e1e853bd4ba873be0b3040ab48c2d9c6
│  │  │  └─ b92fc35df3adc988739ac8efe6bead9fd87311
│  │  ├─ 84
│  │  │  └─ 1f6295b99ffd8fe268bbb184b822a3c2e5600a
│  │  ├─ 85
│  │  │  ├─ 1a1e6bc248c3f2e94ae7cea45a966173408c51
│  │  │  └─ 903bef075205b707d94d15dd26be6c986d3ecf
│  │  ├─ 86
│  │  │  └─ 73be7d1d7744035613fa28bf15827e45f4fa2e
│  │  ├─ 87
│  │  │  └─ deb0598d3333bb16bbc229a8c144017dfe3c05
│  │  ├─ 88
│  │  │  ├─ 0404d01fd723873908232480ee53b25e0f2231
│  │  │  └─ fffae4f63495d4de7ad4a657eda104e46fc248
│  │  ├─ 89
│  │  │  ├─ c41557a46c86b0e7921c266d70cb2bbd11ed0b
│  │  │  └─ e878b0468a3c6528d0b7436451eaa10222533d
│  │  ├─ 8a
│  │  │  ├─ 152bcbbda6ce619ce3833de442ecd8e8fda388
│  │  │  └─ 30979e0d69e851f0a9edbc9a9307973d21f65b
│  │  ├─ 8b
│  │  │  ├─ 2649efe2e80a3347fb4c1838779807e887339c
│  │  │  └─ 5f85dd409d6ab532b99c7f8e60ab62854603f1
│  │  ├─ 8c
│  │  │  ├─ 08582dfeea1c6601a8167e1552b4e89cac7f94
│  │  │  └─ db5019c1d598d67bef618a5a109608f5d705c8
│  │  ├─ 8d
│  │  │  ├─ 256a2988875099d7fce9cd2c9f9de1de87c027
│  │  │  ├─ 67b0069d59cbf1f3a989239ad15bae17af365a
│  │  │  ├─ 82cdcd5e5dbc80a41977b8018160d299e8742f
│  │  │  └─ c7cf85669a93090e4b51ae46a7606b9cc8679e
│  │  ├─ 8e
│  │  │  ├─ 3e1b2241c29f92c622f18290846977f56b2e09
│  │  │  └─ e614f85077da53c509ebfd4066280fb4f9abad
│  │  ├─ 8f
│  │  │  ├─ 2999dca4d752e000845b593381e994664cec50
│  │  │  └─ 534d94168f6679fe861afc5ea8ecb2217e3644
│  │  ├─ 91
│  │  │  └─ dc2a4eab95cab9bb77d646a9e1caee1adbe22b
│  │  ├─ 92
│  │  │  ├─ 1698e2973fc942ce5930d7a508d9dd20784fc5
│  │  │  ├─ 8ec2b7c2329ab14abdc7a9d6d8e0e6d0e7ce2b
│  │  │  ├─ 918f22c6a8776214beb2379cfb3ff6874bd554
│  │  │  └─ c87859c60300db65ee0ec1ba7b190f02d66ecf
│  │  ├─ 93
│  │  │  ├─ 53bdde37b5130fdf3a18ac72d1f6c8a67a155e
│  │  │  ├─ 63f9a1aee3f9ebacef5ddb4983d039b73c9955
│  │  │  └─ 8fb3ac96e2250a362480c3409046954cf7e93b
│  │  ├─ 94
│  │  │  └─ aed392be053082984e307c9fb226b3121cc119
│  │  ├─ 95
│  │  │  └─ 92bebb0113697a54b031c16d4fea35fab7e4c4
│  │  ├─ 97
│  │  │  ├─ 24e03ea0aa9e04ac544248400721f66cf385ac
│  │  │  └─ 9196777577fea3cbd1788e6ed4c1da4e6b7ac6
│  │  ├─ 98
│  │  │  └─ aadf7ee3a16fe90d597758c26740ec914556cc
│  │  ├─ 99
│  │  │  ├─ 1369a4226b8693f052ec9101b238398f68e19e
│  │  │  └─ fe27064879bd6f17fa0954d2936495bdcc89f2
│  │  ├─ 9a
│  │  │  ├─ b19577b6fc3633536ca33860ba8f65ba00bd4e
│  │  │  └─ c3c906cd7dadc93e5fa2e46274265d256f8341
│  │  ├─ 9b
│  │  │  ├─ 60483f8a98d48e903a38c962766de7bd6d350d
│  │  │  └─ d7e7d236f8ce1bdcd96a1b0c162f107d087013
│  │  ├─ 9c
│  │  │  └─ 244b3b3f1f28e8f734c43f5b6ce86407d5f356
│  │  ├─ 9d
│  │  │  ├─ b7baa18ba50a5b9eccfc42a260dfc49ee14ea6
│  │  │  ├─ bcacce7fda38fe55f001f545a1881c7549ece0
│  │  │  └─ d1cab77d8e56a03b1f7c2428877ae72b434227
│  │  ├─ 9e
│  │  │  ├─ 54366d1ef67b04d9e07c4e5d853a016801e0b6
│  │  │  ├─ 8892e898d61cebf061b404b3b5545c63cbfb83
│  │  │  └─ fe0da7c800bb80e024d96ac259c6630e3c7373
│  │  ├─ a0
│  │  │  └─ 8ed9a2104c11f29b57754b797e0f3567174097
│  │  ├─ a1
│  │  │  └─ 1889d0cf11c6e135c0fb1934e5dd7e5e99a56c
│  │  ├─ a2
│  │  │  ├─ 80c5a689b3c5b476a6f1b200516ed4ecdbb400
│  │  │  └─ a156931377c2a615b1cd94f3f22574a59438dd
│  │  ├─ a3
│  │  │  ├─ 63173a441436d3ca43e489a49fccdfa54b796a
│  │  │  └─ dda0aa9996021722c38fce5a8f9f2d34e2adbc
│  │  ├─ a5
│  │  │  └─ cb2c1f7846b652f0d9e827145b213e9c90d887
│  │  ├─ a6
│  │  │  ├─ 340a032eebef2d97532462b91a452173439eec
│  │  │  └─ 6a82217323f811cff14ebf32db48172ae85236
│  │  ├─ a7
│  │  │  └─ 53a468fd4565b7515424fb5f9741d1096900bc
│  │  ├─ aa
│  │  │  └─ 5cb6e0d147858602fad087d2ce11691abd94d3
│  │  ├─ ab
│  │  │  ├─ 11b5274e36a9c077678485d1ec18309d1dd393
│  │  │  ├─ 85e7408affb2f737c8182e0394066d9e5e08d2
│  │  │  └─ d8cb54900d0bbc0efb1e3af0d1e05902afc854
│  │  ├─ ae
│  │  │  ├─ 6903f24e60ecdde09cdbefa6cf0d8cb6b12453
│  │  │  ├─ cfea3abe54ff5dc9d08a5b5ef6804f454fdb17
│  │  │  └─ d659ad548f730993e074611f465c517f2e5c42
│  │  ├─ b0
│  │  │  ├─ 7de6cee9ddfb2ecbf774a0ab7d27d0b16dab61
│  │  │  └─ c93649b0c4b6e939d0c9457e6ea4358895e6d6
│  │  ├─ b1
│  │  │  └─ 3d764d4a83ee91448d8ad86670d3e91f476aa9
│  │  ├─ b2
│  │  │  ├─ 1c990768d7099679b95c545ab4b982c91d821a
│  │  │  ├─ 25a09b4c585e5186822b2b48318480e0efc8cc
│  │  │  └─ 350b5d0dc875e8702c01c44433de2e9c21e9c5
│  │  ├─ b3
│  │  │  └─ 4c20c151de31a79fbe15e608340941256324a4
│  │  ├─ b4
│  │  │  ├─ 45760695e8a236a24e3ec26390d426129003bc
│  │  │  └─ 93703a209783f7ae4844f7e32cca268f1035dc
│  │  ├─ b5
│  │  │  └─ 27ebe282d91e23d3963a2b49ef01831e76af98
│  │  ├─ b6
│  │  │  ├─ 2de577c5a86d27f1da3ce0d286bac118def54c
│  │  │  └─ dadb34ddc874b47d0dcbf80cb97f8192ee4397
│  │  ├─ b8
│  │  │  ├─ e64cada17da2e22fe1975ed1c59715b1d293df
│  │  │  └─ e856d0ca381995a410c928d27411c18c2fc54b
│  │  ├─ b9
│  │  │  └─ 2bc12ecd7ef88000c31f39b6423d67a3cef214
│  │  ├─ ba
│  │  │  ├─ 3d7c501e7a855a45fa4d313a504a7d2e7b4ee5
│  │  │  └─ 6c25836c0d0e016009334be1d464f1de35c929
│  │  ├─ bc
│  │  │  ├─ 537bb059259f1f534c7daef85edaf96d9e836e
│  │  │  └─ 8bbd5f7696aafd4e631f33159cb21b594cae0d
│  │  ├─ bd
│  │  │  └─ aa54c6de3b0e89db6cf585a42a37d67139e275
│  │  ├─ be
│  │  │  ├─ 9f8abb18d808d1f555a5608170d6f315db684e
│  │  │  └─ c3fb3134513dc1da156bc0311d86e3fd486db5
│  │  ├─ bf
│  │  │  ├─ a19754ea9635a2349dc56587480fb96ee9b892
│  │  │  ├─ b6e4ff2276bd0233b7658cbfb2c1af638935ef
│  │  │  └─ f2150f0b1c37026e0983808b1168e779b05588
│  │  ├─ c0
│  │  │  ├─ 0e0e6f2ad37e332bcbdcdcd5b9e53c5c7b03f8
│  │  │  └─ f614d6fab130170a938f63d2e1f28119ab2cdd
│  │  ├─ c2
│  │  │  └─ 15ca2b1b884eae36441cfd10b8541a4709c9a4
│  │  ├─ c3
│  │  │  └─ 6e6817a86ae4807fd7de8fae7d06046015c429
│  │  ├─ c4
│  │  │  └─ d2e00c8dd71c28702f761261073b98ea6de4b3
│  │  ├─ c7
│  │  │  └─ dacea01cacb185e4a44110f0e5e237fd29da08
│  │  ├─ c8
│  │  │  ├─ 39992669be4615b3bc08029d9506a308c44c1c
│  │  │  ├─ 5d5c9ccfe88abd2a9d4409ac175cab8523c4a6
│  │  │  └─ 9e045801589c49462a79bd89bb2dd2a9c589eb
│  │  ├─ c9
│  │  │  ├─ 0640aa86d71ab5f624f1d0f210e23c5b6072bf
│  │  │  ├─ 5575447b7fae3436c58d69b52096f2076ceefd
│  │  │  └─ 96180d738e92adb476132ebb6ca8f189fdce98
│  │  ├─ ca
│  │  │  ├─ 05b88cba450e8ef622a182e8b7cc1a91d966d4
│  │  │  ├─ 67fe8dbbfe0eb6d8750e41f9fa830f2f8b756c
│  │  │  ├─ 72a7020e90ca74f4e9cd2f45f63ac2a1e14ff7
│  │  │  ├─ ae4810ac2f94fd6a5d0dfb7c96b6ba606c5699
│  │  │  └─ bfc368876a42e6eaa8f9522defa7be1a8987c3
│  │  ├─ cc
│  │  │  ├─ 7e3b14ae185bc1d3aa640b219d1cdbe12a1680
│  │  │  ├─ b3a243cb3be74c22fc690a5c44214f22626199
│  │  │  └─ cba677ffbd0f835858b63c1d0dc1775afbee59
│  │  ├─ cd
│  │  │  ├─ abca40f5fb0ac78c722015cb050df38229c408
│  │  │  └─ c0ccecddf2be94edec1817bcda4717c8120f16
│  │  ├─ ce
│  │  │  └─ 173b516732cf75135a2445e6e43a32578ac714
│  │  ├─ cf
│  │  │  ├─ a41bf974bc1872faba313f250715e6942ead7c
│  │  │  └─ dae4e0ae95ff543c1b136fc8cf9eb6187d98c6
│  │  ├─ d0
│  │  │  ├─ 2b878eb3e2aeef374572225a1b649f3d115392
│  │  │  └─ bd456086b284928f4e566393e697ffda7101ce
│  │  ├─ d2
│  │  │  ├─ addb8969ed901430c45a475e2fef2efac85d9b
│  │  │  └─ f0f84a4605d24b03235254b46d2c54f5e13b9f
│  │  ├─ d4
│  │  │  └─ aead788b40e5c14a71f81bc8da9b767c4984d6
│  │  ├─ d5
│  │  │  └─ f356592f5470b7660db30fdeca767d8d22fdf9
│  │  ├─ d6
│  │  │  └─ abf85a8132429a458fdbf25a6e0e5363aab20d
│  │  ├─ d7
│  │  │  └─ 84448c62ccd3122e4c450eac876c9f9dbdecc1
│  │  ├─ d8
│  │  │  └─ 0344ee1e241a3ba30f45497341f4a884a85ccf
│  │  ├─ d9
│  │  │  └─ 6287959bd76b773030368408b31acb6767cb31
│  │  ├─ db
│  │  │  └─ 89cfa1b8e0fb9d38be9098c30f0ab91798c7f5
│  │  ├─ dc
│  │  │  ├─ 22e51da6dc5182024397ebc1adca991460b90b
│  │  │  ├─ 996d176b53f77aea2306c93dcfb443feb2c07a
│  │  │  ├─ b486a47b53cb85ba8df01acbfac6df70381b9e
│  │  │  └─ d57f45722a4c390c83e5c806bc48d7420fee02
│  │  ├─ dd
│  │  │  └─ 91f680f2872f7f2c383d95f9b4f0757890174c
│  │  ├─ df
│  │  │  ├─ aff1a0b57cc577c49b6f86b9bba9deb01d4356
│  │  │  ├─ bc2533ffd393e47ee238f324bfbcd6afda8f75
│  │  │  └─ f8ab0ce3cb98d2339e4db53c6a57864524e789
│  │  ├─ e0
│  │  │  └─ 99383f27e277e30990db51bf266fd7089f3347
│  │  ├─ e1
│  │  │  ├─ a01a43a302480816b4accd00073134c632f493
│  │  │  └─ f4e80d67b4d216be16511a3729ffec720a4462
│  │  ├─ e3
│  │  │  └─ f29287cfe7ef4513cad140a0773be35c209787
│  │  ├─ e4
│  │  │  ├─ 63755f75410447711dbbd6739f8383f15309a7
│  │  │  └─ 886f5dbfa4379098054bc88369d1c216ff86d8
│  │  ├─ e5
│  │  │  ├─ 18d560cd9215cc743a08f38416949c8cacbd6b
│  │  │  ├─ a969382fec7c28545159c82d090be6e044dc0e
│  │  │  └─ eabd6c35e83ecfc96ead3b9466b5c2c72cd36c
│  │  ├─ e6
│  │  │  ├─ 2ef181ac5f46558bf8b6104d036014270c0be3
│  │  │  ├─ 8ac2fc717d18ec2d14a46e71b3d7188d2d876d
│  │  │  └─ ac00f013aaa9abca6eee1a79cdec2c51d727a5
│  │  ├─ e7
│  │  │  ├─ 5fe42177134323abfc6561730714d800d7eee6
│  │  │  └─ 72c5888b4e3d14e0bdb2de454fd31a4ae11658
│  │  ├─ e8
│  │  │  ├─ 3627376b46efd96063dc7a00869779b6597230
│  │  │  └─ c0328d518d6d55ba6afccbacaf4e9f0f4e63bd
│  │  ├─ e9
│  │  │  ├─ d5c5a3162eb960a4ee3a835a74a62c97fd6674
│  │  │  └─ ed23b0eeae6f604c51136ea06a602d3278bbaf
│  │  ├─ ea
│  │  │  ├─ 176e947169ae9554d52fea466dc0cd5cfb494e
│  │  │  ├─ 442eb668e94910ea9529c0888aaad2100928d2
│  │  │  └─ 84e71859a2125e4e3b6b3f5c933dce31a42f7b
│  │  ├─ f0
│  │  │  ├─ 0fddff0e94dabf2725cbc8f117e76bdf2b5f72
│  │  │  ├─ 42a9703464d92aec07cd1727fdf7cadcee9bd8
│  │  │  └─ 61e499212849603d336502aa84fe4b99732909
│  │  ├─ f2
│  │  │  └─ 2a20a1cbdcb400d440c969bdab8e60fcfb085a
│  │  ├─ f3
│  │  │  └─ 886f919d7d8343ec872c6622203ba5cb7bcf24
│  │  ├─ f4
│  │  │  ├─ 017e33003fbc52b8b4848a9c91e6bd99f76424
│  │  │  └─ 1d551d4e56e60e4b9c8c1822dc8654de50d4b1
│  │  ├─ f5
│  │  │  ├─ 2d704d5e0ae8c6a9a230d4f780dca81244235d
│  │  │  └─ e101d7ec31c3a8c803ca280e115e8900224169
│  │  ├─ f6
│  │  │  └─ c8f1e9dc96b4c3c250073de7bda4c8a91a4dac
│  │  ├─ f7
│  │  │  ├─ 5653587b49f10fe99aca7c916b631d57ba4ca6
│  │  │  ├─ d3987d8789ff4801e2ccc7d1fca95be572aa08
│  │  │  └─ da876da275e9ccd64d8194a6c11b1565206a86
│  │  ├─ f8
│  │  │  ├─ 211ec3c859c93bc8ecc8f093163c873f631735
│  │  │  ├─ 229a6ba200d22f01aa8f9a22764068ffbe7d97
│  │  │  ├─ 67da8d319dc79cfbfa97c8ed387f7c188ae944
│  │  │  ├─ 6c6ffed23e3ec887501633d3d6df2dd5e791ff
│  │  │  ├─ a44c33cb80e2b5701eb8be7e2e3c0b4c96661c
│  │  │  └─ d6384aa3b31471e3ef572caefaf81ff52faa34
│  │  ├─ f9
│  │  │  ├─ f1494e43f6899c640ddd9b10fe1fc0cfde9f30
│  │  │  └─ faf08e2e8de048c981f0afa1d2839ac2df39a4
│  │  ├─ fa
│  │  │  └─ a71d1d49f1a7895eb01f212f3cc133ccb64abd
│  │  ├─ fb
│  │  │  └─ 080628c13c9cf081ea304545ab56febce4eacf
│  │  ├─ fc
│  │  │  ├─ 58cd50e83de96a1f33416ecd4f19aafdd06e7e
│  │  │  ├─ 6010956e0f44291f1c26f03cc0f9da3e123fc7
│  │  │  └─ bcd05c3e2c40f40d152b2b6d8f3b4d3c06fb0c
│  │  ├─ fd
│  │  │  └─ e4c8631c36b0a34c5106b1e6f47dfabdf59b1f
│  │  ├─ fe
│  │  │  └─ f32ea329b87f22d7006c636b5a5a2c81e0d6a4
│  │  ├─ ff
│  │  │  ├─ 2d19303fbcbb8ddc700480443f6d9d0298203f
│  │  │  └─ bb555156c4821bb3564418d42e4799e58cf6b2
│  │  ├─ info
│  │  └─ pack
│  │     ├─ pack-2daa3f3867bad4051e15c32fed3b60824ae8ba8d.idx
│  │     ├─ pack-2daa3f3867bad4051e15c32fed3b60824ae8ba8d.pack
│  │     ├─ pack-3db4b81b5925b8e3c32dad639a4cace865d161a8.idx
│  │     ├─ pack-3db4b81b5925b8e3c32dad639a4cace865d161a8.pack
│  │     ├─ pack-c3d6bd04d8e921661b1eb9291f1f829ca0881eb7.idx
│  │     ├─ pack-c3d6bd04d8e921661b1eb9291f1f829ca0881eb7.pack
│  │     ├─ pack-e7e16fb53906ea5a6e458b7fed33d3ab9f0a6002.idx
│  │     └─ pack-e7e16fb53906ea5a6e458b7fed33d3ab9f0a6002.pack
│  ├─ ORIG_HEAD
│  ├─ packed-refs
│  └─ refs
│     ├─ heads
│     │  ├─ animationFicheProfil
│     │  ├─ dev
│     │  ├─ ficheMailing
│     │  ├─ ficheProfil
│     │  ├─ fix
│     │  ├─ fixPHPCS
│     │  ├─ main
│     │  └─ remasterFiche
│     ├─ remotes
│     │  └─ origin
│     │     ├─ animationFicheProfil
│     │     ├─ dev
│     │     ├─ ficheProfil
│     │     ├─ fix
│     │     ├─ fixPHPCS
│     │     ├─ HEAD
│     │     └─ remasterFiche
│     ├─ stash
│     └─ tags
├─ .github
│  └─ workflows
│     ├─ deploy-traefik.yml
│     └─ main.yml
├─ .gitignore
├─ assets
│  ├─ app.js
│  ├─ bootstrap.js
│  ├─ bundle-app.js
│  ├─ controllers
│  │  └─ hello_controller.js
│  ├─ controllers.json
│  ├─ Deck.js
│  ├─ GamePlay.js
│  ├─ GameUI.js
│  ├─ images
│  │  ├─ adresse.png
│  │  ├─ bigFavicon.png
│  │  ├─ cedric.jpg
│  │  ├─ degout.png
│  │  ├─ ennui.png
│  │  ├─ etonnement.png
│  │  ├─ facebook.png
│  │  ├─ Favicon.png
│  │  ├─ imgProfil.jpg
│  │  ├─ joie.png
│  │  ├─ Logo.png
│  │  ├─ mail.png
│  │  ├─ panier.png
│  │  ├─ satisfaction.png
│  │  ├─ tel.png
│  │  ├─ test.png
│  │  ├─ user.png
│  │  ├─ wave.svg
│  │  ├─ wavebackground.svg
│  │  ├─ Wine-Glass-alone.png
│  │  └─ wine.png
│  └─ styles
│     ├─ animations.scss
│     ├─ app.scss
│     ├─ blog.scss
│     ├─ boutique.scss
│     ├─ faq.scss
│     ├─ fiche-profil.scss
│     ├─ ficheEmail.scss
│     ├─ footer.scss
│     ├─ form.scss
│     ├─ globale.scss
│     ├─ lexique.scss
│     ├─ login.scss
│     ├─ memory.scss
│     ├─ popupmessage.scss
│     ├─ profil.scss
│     ├─ quizz.scss
│     ├─ shopcart.scss
│     ├─ showanimation.scss
│     └─ _wcs.scss
├─ bash.exe.stackdump
├─ bin
│  ├─ console
│  └─ phpunit
├─ captain-definition
├─ composer.json
├─ composer.lock
├─ config
│  ├─ bundles.php
│  ├─ packages
│  │  ├─ cache.yaml
│  │  ├─ debug.yaml
│  │  ├─ doctrine.yaml
│  │  ├─ doctrine_migrations.yaml
│  │  ├─ framework.yaml
│  │  ├─ mailer.yaml
│  │  ├─ messenger.yaml
│  │  ├─ monolog.yaml
│  │  ├─ notifier.yaml
│  │  ├─ reset_password.yaml
│  │  ├─ routing.yaml
│  │  ├─ security.yaml
│  │  ├─ sensio_framework_extra.yaml
│  │  ├─ translation.yaml
│  │  ├─ twig.yaml
│  │  ├─ uid.yaml
│  │  ├─ validator.yaml
│  │  ├─ vich_uploader.yaml
│  │  ├─ webpack_encore.yaml
│  │  └─ web_profiler.yaml
│  ├─ preload.php
│  ├─ routes
│  │  ├─ framework.yaml
│  │  ├─ ux_autocomplete.yaml
│  │  └─ web_profiler.yaml
│  ├─ routes.yaml
│  └─ services.yaml
├─ docker-compose.yml
├─ docker-entry.sh
├─ Dockerfile
├─ grumphp.yml
├─ migrations
│  ├─ .gitignore
│  ├─ Version20230605142401.php
│  ├─ Version20230606074947.php
│  ├─ Version20230606075047.php
│  ├─ Version20230607073638.php
│  ├─ Version20230607092844.php
│  ├─ Version20230607094908.php
│  ├─ Version20230607150740.php
│  ├─ Version20230614145036.php
│  ├─ Version20230615135616.php
│  ├─ Version20230622143842.php
│  ├─ Version20230626100114.php
│  └─ Version20230626102806.php
├─ nginx.conf
├─ package-lock.json
├─ package.json
├─ php.ini
├─ phpcpd.xml
├─ phpstan.neon
├─ public
│  ├─ assets
│  │  └─ images
│  │     ├─ ateliercreation.jpg
│  │     ├─ atelierdegustation.jpg
│  │     └─ profils
│  │        ├─ bonbon.png
│  │        ├─ chardo-ne.png
│  │        └─ terrien.png
│  └─ index.php
├─ README.md
├─ src
│  ├─ Controller
│  │  ├─ .gitignore
│  │  ├─ Admin
│  │  │  ├─ AtelierCrudController.php
│  │  │  ├─ BlogCrudController.php
│  │  │  ├─ CepageCrudController.php
│  │  │  ├─ DashboardController.php
│  │  │  ├─ FaqCrudController.php
│  │  │  ├─ UserCrudController.php
│  │  │  └─ VinCrudController.php
│  │  ├─ AdminWelcomeController.php
│  │  ├─ AnimationsController.php
│  │  ├─ AtelierController.php
│  │  ├─ BlogController.php
│  │  ├─ CartController.php
│  │  ├─ CepageController.php
│  │  ├─ FaqController.php
│  │  ├─ FicheDegustationController.php
│  │  ├─ HomeController.php
│  │  ├─ LexiqueController.php
│  │  ├─ LoginController.php
│  │  ├─ MemoryController.php
│  │  ├─ ProfilController.php
│  │  ├─ RecetteController.php
│  │  ├─ RegistrationController.php
│  │  ├─ ResetPasswordController.php
│  │  ├─ ShopController.php
│  │  ├─ UserController.php
│  │  └─ VinController.php
│  ├─ DataFixtures
│  │  ├─ AdminFixtures.php
│  │  ├─ AppFixtures.php
│  │  ├─ FaqFixtures.php
│  │  ├─ ProfilFixtures.php
│  │  ├─ UserFixtures.php
│  │  └─ VinFixtures.php
│  ├─ Entity
│  │  ├─ .gitignore
│  │  ├─ Animations.php
│  │  ├─ Atelier.php
│  │  ├─ Blog.php
│  │  ├─ Caracteristique.php
│  │  ├─ Cepage.php
│  │  ├─ Faq.php
│  │  ├─ Favoris.php
│  │  ├─ FicheDegustation.php
│  │  ├─ Jeux.php
│  │  ├─ Note.php
│  │  ├─ Panier.php
│  │  ├─ Profil.php
│  │  ├─ Recette.php
│  │  ├─ ResetPasswordRequest.php
│  │  ├─ User.php
│  │  └─ Vin.php
│  ├─ Form
│  │  ├─ AnimationsType.php
│  │  ├─ AtelierType.php
│  │  ├─ BlogType.php
│  │  ├─ CepageType.php
│  │  ├─ ChangePasswordFormType.php
│  │  ├─ ContactForm.php
│  │  ├─ FaqType.php
│  │  ├─ FicheDegustationType.php
│  │  ├─ ProfilType.php
│  │  ├─ RecetteType.php
│  │  ├─ RegistrationFormType.php
│  │  ├─ ResetPasswordRequestFormType.php
│  │  ├─ SearchVinType.php
│  │  ├─ UserType.php
│  │  └─ VinType.php
│  ├─ Kernel.php
│  ├─ Repository
│  │  ├─ .gitignore
│  │  ├─ AnimationsRepository.php
│  │  ├─ AtelierRepository.php
│  │  ├─ BlogRepository.php
│  │  ├─ CaracteristiqueRepository.php
│  │  ├─ CepageRepository.php
│  │  ├─ FaqRepository.php
│  │  ├─ FavorisRepository.php
│  │  ├─ FicheDegustationRepository.php
│  │  ├─ JeuxRepository.php
│  │  ├─ NoteRepository.php
│  │  ├─ PanierRepository.php
│  │  ├─ ProfilRepository.php
│  │  ├─ RecetteRepository.php
│  │  ├─ ResetPasswordRequestRepository.php
│  │  ├─ UserRepository.php
│  │  └─ VinRepository.php
│  ├─ Security
│  │  └─ LoginFormAuthenticator.php
│  └─ Service
│     ├─ CartShopService.php
│     ├─ MailerService.php
│     └─ TemplatedMail.php
├─ symfony.lock
├─ templates
│  ├─ animations
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  └─ _form.html.twig
│  ├─ atelier
│  │  ├─ edit.html.twig
│  │  ├─ ficheProfil.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ resume.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ base.html.twig
│  ├─ baseEmail.html.twig
│  ├─ base_degustation.html.twig
│  ├─ blog
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ visiteur.html.twig
│  │  ├─ visiteurshow.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ cepage
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ degustation
│  │  └─ index.html.twig
│  ├─ faq
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ visiteur.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ ficheEmail.html.twig
│  ├─ fiche_degustation
│  │  ├─ creationFiche.html.twig
│  │  ├─ edit.html.twig
│  │  ├─ ficheDegustation.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ histoire
│  │  └─ histoire.html.twig
│  ├─ home
│  │  └─ index.html.twig
│  ├─ lexique
│  │  └─ index.html.twig
│  ├─ memory
│  │  └─ index.html.twig
│  ├─ mentions
│  │  └─ mentions.html.twig
│  ├─ newContactMail.html.twig
│  ├─ profil
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ profil.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ recette
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ visiteur.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ registration
│  │  └─ register.html.twig
│  ├─ reset_password
│  │  ├─ check_email.html.twig
│  │  ├─ email.html.twig
│  │  ├─ request.html.twig
│  │  └─ reset.html.twig
│  ├─ security
│  │  └─ login.html.twig
│  ├─ shop
│  │  ├─ index.html.twig
│  │  └─ shopCart.html.twig
│  ├─ user
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ vin
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ _footer.html.twig
│  ├─ _navbar.html.twig
│  ├─ _navbar_backoffice.html.twig
│  └─ _popUpMessage.html.twig
├─ tests
│  ├─ .gitignore
│  └─ bootstrap.php
├─ translations
│  └─ .gitignore
├─ webpack.config.js
└─ yarn.lock

```
```
032023-PHP-SXB-innovin
├─ .editorconfig
├─ .env
├─ .env.test
├─ .eslintrc.yml
├─ .git
│  ├─ COMMIT_EDITMSG
│  ├─ config
│  ├─ description
│  ├─ FETCH_HEAD
│  ├─ HEAD
│  ├─ hooks
│  │  ├─ applypatch-msg.sample
│  │  ├─ commit-msg
│  │  ├─ commit-msg.sample
│  │  ├─ fsmonitor-watchman.sample
│  │  ├─ post-update.sample
│  │  ├─ pre-applypatch.sample
│  │  ├─ pre-commit
│  │  ├─ pre-commit.sample
│  │  ├─ pre-merge-commit.sample
│  │  ├─ pre-push.sample
│  │  ├─ pre-rebase.sample
│  │  ├─ pre-receive.sample
│  │  ├─ prepare-commit-msg.sample
│  │  ├─ push-to-checkout.sample
│  │  └─ update.sample
│  ├─ index
│  ├─ info
│  │  └─ exclude
│  ├─ logs
│  │  ├─ HEAD
│  │  └─ refs
│  │     ├─ heads
│  │     │  ├─ animationFicheProfil
│  │     │  ├─ dev
│  │     │  ├─ ficheMailing
│  │     │  ├─ ficheProfil
│  │     │  ├─ fix
│  │     │  ├─ fixPHPCS
│  │     │  ├─ main
│  │     │  └─ remasterFiche
│  │     ├─ remotes
│  │     │  └─ origin
│  │     │     ├─ animationFicheProfil
│  │     │     ├─ dev
│  │     │     ├─ ficheProfil
│  │     │     ├─ fix
│  │     │     ├─ fixPHPCS
│  │     │     ├─ HEAD
│  │     │     └─ remasterFiche
│  │     └─ stash
│  ├─ objects
│  │  ├─ 00
│  │  │  ├─ 33a65d046fb74eab284d3a9a131a685620eb55
│  │  │  └─ 92ebf5b40046ef01036735b7cc88bf671e91f1
│  │  ├─ 01
│  │  │  ├─ 38e2c878cbf71dab0e6a581af74bd0e230f0bb
│  │  │  └─ c09242d655d6cf5cc7580da0dc35b031ecf822
│  │  ├─ 02
│  │  │  ├─ a413f6bf20105cd87b419f9dab80cabcf62e35
│  │  │  ├─ d79d160d7a3982fd9bb0e8ab6cd99982d080fe
│  │  │  └─ fecf1ed81b522971464a670466732036f34e51
│  │  ├─ 03
│  │  │  └─ dc726c1a2f5b4e305d7ca241277849321a1467
│  │  ├─ 04
│  │  │  ├─ 80b804bd533cddce12510ade3750f86e7d76d0
│  │  │  ├─ cf7e67111d34b858f208fa784fc58dc1e28c04
│  │  │  └─ f43b2348292c1e1d48585929eac30aa7432d74
│  │  ├─ 07
│  │  │  └─ 9567b8ee380a89e06dbc4eed41da56887109ed
│  │  ├─ 0a
│  │  │  ├─ 7031b0ecbf11c79b4ecca190d7527be6baadad
│  │  │  └─ b8c0d2e06c6290776ac40fccae08eac2fecfb3
│  │  ├─ 0b
│  │  │  ├─ 2f8afb4f528652e7605f104fad128867de470d
│  │  │  └─ 63de91824d5edd660f8ed285dce6156bd08186
│  │  ├─ 0c
│  │  │  ├─ 273cb30dcd41d4b8e9c45dcb5f713e429f3ece
│  │  │  ├─ af50edc2e58e194c67263669f982cd880c66b5
│  │  │  └─ ff5fada099f30a04b3e6958e0cfd8351f8fde0
│  │  ├─ 0e
│  │  │  ├─ 06bdb7710a02d6d5ac898f9fddc2d5bd3cd843
│  │  │  ├─ af548b3e912ed4c03b592e80f95e0c89ea1f96
│  │  │  └─ cadd2ccb728062b8e719bfc2e189e59d582f59
│  │  ├─ 0f
│  │  │  └─ c63705aae2ad907c85be3142fd83dea444c9f4
│  │  ├─ 11
│  │  │  ├─ 0827899ce8e12b9dd7e757f15ea121a218638c
│  │  │  └─ 5eb99077e5349dd2336e9442daf63a3940e9e6
│  │  ├─ 12
│  │  │  └─ b466a07c8b30ea1d67265fc374808a65b05685
│  │  ├─ 16
│  │  │  └─ 378f28edd5fbb2d3ffa21f1c7e8c5568619d5d
│  │  ├─ 17
│  │  │  └─ 895d2b1574b5afe033c419e0e99018e8ef1947
│  │  ├─ 19
│  │  │  ├─ 105bb91ebab71166205a82c4bc87010a4a3987
│  │  │  └─ 2c0e8c343fa1f1e44e5c68cfb8a9a18ed442c8
│  │  ├─ 1a
│  │  │  └─ 2ee6e302edc0f7338f761cbedd311de1151c23
│  │  ├─ 1b
│  │  │  └─ 3588cc63394678bd565b56aa968ec44d4cad1b
│  │  ├─ 1d
│  │  │  ├─ b6603b2f9828f1a08d79f3e1ae409ecfee6fd4
│  │  │  └─ f3c3ef644b1f21db81b179bf6cac2c91dcb511
│  │  ├─ 20
│  │  │  └─ 762be8bc3ac06dc3dd8fbf2787c3b9b0628c47
│  │  ├─ 21
│  │  │  ├─ 25dcfefa8a27a0a8909c6709146267acc26e21
│  │  │  └─ 2a505dde5f01fe33af088c8775b6672ae5e378
│  │  ├─ 23
│  │  │  └─ 8d40af40f0cf46c25da74c16238578a3213735
│  │  ├─ 24
│  │  │  ├─ 5ee39dfbc3899575205045b3e6be3001e2298f
│  │  │  ├─ 695cdc47b832c19095375fe2bb2baabb518377
│  │  │  ├─ 6ac63066973a6cb6718e2003ba89b31997f349
│  │  │  └─ e18183bbce2568e35bc15a1b05d554019993f2
│  │  ├─ 25
│  │  │  └─ cf02c0554a37f891601738a0a86852632e5874
│  │  ├─ 27
│  │  │  ├─ c31d7f27a0e2298a7e3f51acd027122d73a8a8
│  │  │  └─ c3d25dfb0985c0a815349300ab4f14f1014902
│  │  ├─ 28
│  │  │  ├─ 0752a3d1db68864c13117f144c1a4fc4322ac8
│  │  │  ├─ 56b24d7fd47126187ba1172058db2125030fda
│  │  │  ├─ 68f64fecb26dd0bd26eefe7dcc89f889f69c2d
│  │  │  └─ b20f0551229911114105622f87a4058f306578
│  │  ├─ 29
│  │  │  ├─ 95ab53513a89f81cfc3cd15a6f794c597d0c67
│  │  │  └─ d78467f209f6b45fb31d6133fb311b8b988ff8
│  │  ├─ 2a
│  │  │  ├─ 026633c83f606593d99d017c867f993be61f48
│  │  │  └─ 7f1e9b38594a5fd805459c1f9258dae389b450
│  │  ├─ 2c
│  │  │  └─ c2880c60d816ed8c7a33de45b632c0d9b7d53a
│  │  ├─ 2d
│  │  │  └─ 8aa8bb9fc77863c2edf56f3a850aaad1249574
│  │  ├─ 2e
│  │  │  └─ f3a294ce44a800238c688f7a889e0b12e0eebf
│  │  ├─ 30
│  │  │  ├─ 45ea83b7d8ecf3cd019c06f14d30fcc907e4e0
│  │  │  └─ 567f794205e83cdfaccb9161662fa1584aab8f
│  │  ├─ 31
│  │  │  ├─ 029acff9d606acff57a2e77c99942dfdcd2d20
│  │  │  └─ bc510e7f955a276bf7f495a876281b66dc0ccb
│  │  ├─ 32
│  │  │  └─ 11abb851987c306e47c46a5c43928e35c88ee4
│  │  ├─ 34
│  │  │  └─ fef71c70279fea815708aaf8c2b9c248428774
│  │  ├─ 35
│  │  │  ├─ 93208c16ba38f5cd7a11b13330a91ee9f78a83
│  │  │  ├─ abc9a500fc9b2e87d0bdb83330f1a1da2e2dde
│  │  │  └─ d7d13cb8ed29de5d3dce6d13ac9e57eb8e5684
│  │  ├─ 36
│  │  │  ├─ 679f04cf7b96cdb9932eca2ce28b781c4cde14
│  │  │  └─ f5a9b827a10f62481a708eee4c790679be9f55
│  │  ├─ 37
│  │  │  ├─ 29e13ce4b42776586dbf4df830097bfd93a50d
│  │  │  ├─ 8b29e5ef0df87c669b75ab59aa66530df318b0
│  │  │  └─ df98b21bc381ac0dc5825a1a6a8b9397e3c93e
│  │  ├─ 38
│  │  │  ├─ 587077b47410dc20a39f82c229d6a575adf588
│  │  │  └─ 6f34141dbaaec868fd23fbc2058f53307f1ec8
│  │  ├─ 3a
│  │  │  ├─ 1e9993281f46b082b09e38afac88af32860f53
│  │  │  └─ dd9847cd3b61385249d604633d30cb201bb175
│  │  ├─ 3c
│  │  │  └─ 6061740ef0b3c3e1a306b6009958ec0249b290
│  │  ├─ 3d
│  │  │  ├─ 4df20f83b21bd5b9fbeb7bf79a8d7fbde1771e
│  │  │  └─ 82c8fbf3e25b473417bba51fe8c5a592afc372
│  │  ├─ 3e
│  │  │  ├─ 7dc46cae380d44a4374925bda22c887b9faf79
│  │  │  ├─ bc93f6d06607be796a059a855c41bb07c728ac
│  │  │  └─ d2168429026d07eed20e25158116e4e7a1693e
│  │  ├─ 3f
│  │  │  └─ 2a802250cc34eb86d597d6bf6d620ed669f543
│  │  ├─ 42
│  │  │  ├─ 4661edcf107b72c7883a60a3715f625cf7bcb9
│  │  │  └─ 586bf145789e4a60854a6bed02e57f2f65d31a
│  │  ├─ 43
│  │  │  └─ 12cbd7e7e74181246cee850423dbd4fdb47ddd
│  │  ├─ 44
│  │  │  ├─ 6b36e3be4642874f12963f31b1ef3d0364c82b
│  │  │  └─ dea61769169504c33043791e9e2f5c8ce8797f
│  │  ├─ 46
│  │  │  └─ 29f689cf3b20130a72353a366a116e3e3fd51f
│  │  ├─ 47
│  │  │  └─ c726d058f5ee7098cbbb2f8f2dfd9635a12eea
│  │  ├─ 49
│  │  │  └─ 771b3dac488f22980c29f172ef0e12a4232272
│  │  ├─ 4a
│  │  │  ├─ 0772a42e62d68e0a6d6c1c97b649215c5462f7
│  │  │  └─ 40807ccb94c7a1cea9516ab8a11637de49eca0
│  │  ├─ 4b
│  │  │  ├─ 9f178916693b76c12706912961afd66ae7a656
│  │  │  ├─ b789931af6664559059c94558f671a168ec0f8
│  │  │  └─ e23e97a1e68dcb1ab176e5a8a71c781016f8ea
│  │  ├─ 4d
│  │  │  ├─ 00ba5e80b1399d8b3303b8a0edc2f974fa76cf
│  │  │  ├─ 5951ec272710ff833f5e92b856f7a4a61e4f5a
│  │  │  └─ 8a71a183022adfcff48800ee97d4519316933e
│  │  ├─ 4e
│  │  │  ├─ 3218c4c2ec06fc11e53941ffe2b008a7582d71
│  │  │  └─ 990e7e2e276228eeb61465df378863bef7c8c9
│  │  ├─ 4f
│  │  │  └─ 2467372fec66a35879330e1b9d033359ba0572
│  │  ├─ 50
│  │  │  └─ 63ef96588c256ba6821aa3b1a7f5e01b7ff905
│  │  ├─ 52
│  │  │  └─ 82b534a03caa68a52e783b37b8d50e2cd2cc1b
│  │  ├─ 53
│  │  │  └─ c7586f2349144e2bc8f539f3f1c4954d3a8b06
│  │  ├─ 56
│  │  │  └─ 1c591cac1b52f20813b8b94588bb9a9ba3816e
│  │  ├─ 57
│  │  │  └─ aad294959ef9afad954d355d3d8fe66d1b6e45
│  │  ├─ 58
│  │  │  └─ 92ccadfa7ed00ec698e25f360cec3d71f6d6b8
│  │  ├─ 59
│  │  │  ├─ ad04893131a29de2a55f78f0e0acbe4e76ae59
│  │  │  └─ b97925bac9b20a3fbf93a43c73e1aa4af05b82
│  │  ├─ 5a
│  │  │  └─ 041df0e2272994ff610231879c50d0f166786d
│  │  ├─ 5b
│  │  │  └─ e3757fca349a2cf708d448b77116874a6309cf
│  │  ├─ 5c
│  │  │  ├─ 3ec2ed23c4085f7e2081f5f5aef1e51cf5f550
│  │  │  ├─ 8edafb81361a9309bcf9e6966ee88e1e09b649
│  │  │  └─ e99ff6ed930f6c793bbae9d49a7c1f8c7c00f4
│  │  ├─ 5d
│  │  │  ├─ 1aee4a235c2ba1a7c72a847e408ac514b0dc2d
│  │  │  └─ a9d85466ffb181a4283537836f342332711618
│  │  ├─ 5e
│  │  │  └─ df537a8f94b8c402c00a2779d2126d07c5208f
│  │  ├─ 5f
│  │  │  └─ 70c41e77edc4dd3448fd38dd2d9ac8091a0607
│  │  ├─ 60
│  │  │  ├─ 1f2b4145e5d8ea9bbe736e30b4abb4f3827c13
│  │  │  ├─ 22809bdc557ee8b738e2b46675dddc795a8e26
│  │  │  ├─ 3145f2db87e5033e1473071b4eebd5c5cdad89
│  │  │  ├─ db260f3541d4c56925ca3d2028cb052f910c36
│  │  │  └─ e0b903c46b8a5da778b7ad73b80e79fb8661e2
│  │  ├─ 61
│  │  │  └─ 072187bdc96fd85c9edf3b0b8bef2c7e51d537
│  │  ├─ 62
│  │  │  ├─ 1a5881dde58fb255efb0aac26f9d2f19bfd12a
│  │  │  ├─ 3a950beb9be3f6cff11b3b8178dec3d78a49c5
│  │  │  └─ d4b7d2b1df5ce2c14ff800f915ad233dd90fd3
│  │  ├─ 63
│  │  │  └─ d1fde31958671618dcf873bfe53590a81e4239
│  │  ├─ 64
│  │  │  ├─ 3d164b7d3ccb32e3dc68122a2f51660de8c8c7
│  │  │  └─ 924df0a546d5f3496f0835e12f0b30bb2b4bd2
│  │  ├─ 65
│  │  │  └─ 8f7aa94f1c7e975b8ec2548478b0d1acd32187
│  │  ├─ 66
│  │  │  ├─ 73e0ef97853f035ca8a92562b4bd766fdccab8
│  │  │  ├─ 8e6e099f37605874cdc8881a5a2983ac7fc486
│  │  │  └─ c9204986e50ee0ddfc08d79a024ef3bc65aefa
│  │  ├─ 67
│  │  │  ├─ 0065e7a491eaa8c4d1804808e6d46b55262607
│  │  │  ├─ 08171298f7fd36a4f011d2d66fd9487cdd77cb
│  │  │  ├─ 3ddbdfb9c334297bad602cc8f76f66b8f66708
│  │  │  └─ 49db79718937e6388546e750b85a00a3c83707
│  │  ├─ 68
│  │  │  └─ 4b023723eef3e7aab14215442864582604f80c
│  │  ├─ 69
│  │  │  ├─ 2d2927ed035b847ee463a21bd39f431036bc70
│  │  │  ├─ 66929f037ce0a652adf28b9c633971c5236432
│  │  │  └─ 80a9d79529099f2ef51761301d22d1bb503eac
│  │  ├─ 6b
│  │  │  ├─ 1d9e5df1b303c0d9376a7a99b6543de044c42b
│  │  │  └─ 3d352fd622c6cb2bb522554c75899efa5580b7
│  │  ├─ 6c
│  │  │  └─ d950e2d0511d0a6aa7aa9ab70a5a53fdb0be8b
│  │  ├─ 6d
│  │  │  └─ 7d0048363bc01eb7426e4168a924b9199701ba
│  │  ├─ 6e
│  │  │  ├─ 4c891609fdb32e0b5dd4b7585d9791713215ae
│  │  │  └─ f854c179a5cbc0f746b42bd8f0321e5dcf30cd
│  │  ├─ 6f
│  │  │  └─ ecb1d9feec581b66a24398964ff11409ad2733
│  │  ├─ 70
│  │  │  └─ 5562a76df0884bdc4aa56a015ed848d797334d
│  │  ├─ 71
│  │  │  └─ a6d888dbc9bed8caccc0231b306d96e6bd2999
│  │  ├─ 72
│  │  │  └─ 5acc3a7a59df4c83cd5ea405c2b4eed7c6b107
│  │  ├─ 73
│  │  │  └─ d6f560ab2bc9763d272a9eeac1d2692e86adb8
│  │  ├─ 74
│  │  │  ├─ 1350d1bd3cee080fcb6adca4b05b7c197e3115
│  │  │  └─ 8c852056f379e95f2564e727b37e50577f5d9c
│  │  ├─ 76
│  │  │  └─ e6dbdc8d98a70e20dced62cd80e7177ce8e2ba
│  │  ├─ 79
│  │  │  └─ 8eb77472c6cdbb288448eda0592eaadc5db553
│  │  ├─ 7a
│  │  │  └─ 06a6527ebb750a25d2435d25a1ee1ff600fa37
│  │  ├─ 7b
│  │  │  └─ 83600bade952abc27433499cd64432813875a8
│  │  ├─ 7c
│  │  │  ├─ 3d8761229843eac4797bdd938ade87a4fe13ff
│  │  │  ├─ 56bd487e2312c5d9c475241bc41e8a266bfc27
│  │  │  ├─ 7d87bebf71826a3aed3d8638d80b2268c589b3
│  │  │  └─ bb8ee62cdd57bc1f0312089294e14b2f9c3931
│  │  ├─ 7d
│  │  │  └─ a2e6a726d6a7f317f9b92527d542e008ba7a3e
│  │  ├─ 80
│  │  │  ├─ 1a30d1c9ddfac70051ba30b97b186fb17f1aeb
│  │  │  └─ a85382572cfa5d26952fad7a4bbcbed4ba4583
│  │  ├─ 81
│  │  │  └─ dbfbbe26d8f856a38a6354f2cd3ebf99118245
│  │  ├─ 82
│  │  │  ├─ 783185d53372fca5aefdfde0a562997edc7b56
│  │  │  └─ f05eda32c9126dcadfc87f8513cf1a047c9bca
│  │  ├─ 83
│  │  │  ├─ 6a177c42bb1e7aaeb79fa5be7a929ce4c55974
│  │  │  ├─ ab7607e1e853bd4ba873be0b3040ab48c2d9c6
│  │  │  └─ b92fc35df3adc988739ac8efe6bead9fd87311
│  │  ├─ 84
│  │  │  └─ 1f6295b99ffd8fe268bbb184b822a3c2e5600a
│  │  ├─ 85
│  │  │  ├─ 1a1e6bc248c3f2e94ae7cea45a966173408c51
│  │  │  └─ 903bef075205b707d94d15dd26be6c986d3ecf
│  │  ├─ 86
│  │  │  └─ 73be7d1d7744035613fa28bf15827e45f4fa2e
│  │  ├─ 87
│  │  │  └─ deb0598d3333bb16bbc229a8c144017dfe3c05
│  │  ├─ 88
│  │  │  ├─ 0404d01fd723873908232480ee53b25e0f2231
│  │  │  └─ fffae4f63495d4de7ad4a657eda104e46fc248
│  │  ├─ 89
│  │  │  ├─ c41557a46c86b0e7921c266d70cb2bbd11ed0b
│  │  │  └─ e878b0468a3c6528d0b7436451eaa10222533d
│  │  ├─ 8a
│  │  │  ├─ 152bcbbda6ce619ce3833de442ecd8e8fda388
│  │  │  └─ 30979e0d69e851f0a9edbc9a9307973d21f65b
│  │  ├─ 8b
│  │  │  ├─ 2649efe2e80a3347fb4c1838779807e887339c
│  │  │  └─ 5f85dd409d6ab532b99c7f8e60ab62854603f1
│  │  ├─ 8c
│  │  │  ├─ 08582dfeea1c6601a8167e1552b4e89cac7f94
│  │  │  └─ db5019c1d598d67bef618a5a109608f5d705c8
│  │  ├─ 8d
│  │  │  ├─ 256a2988875099d7fce9cd2c9f9de1de87c027
│  │  │  ├─ 67b0069d59cbf1f3a989239ad15bae17af365a
│  │  │  ├─ 82cdcd5e5dbc80a41977b8018160d299e8742f
│  │  │  └─ c7cf85669a93090e4b51ae46a7606b9cc8679e
│  │  ├─ 8e
│  │  │  ├─ 3e1b2241c29f92c622f18290846977f56b2e09
│  │  │  └─ e614f85077da53c509ebfd4066280fb4f9abad
│  │  ├─ 8f
│  │  │  ├─ 2999dca4d752e000845b593381e994664cec50
│  │  │  └─ 534d94168f6679fe861afc5ea8ecb2217e3644
│  │  ├─ 91
│  │  │  └─ dc2a4eab95cab9bb77d646a9e1caee1adbe22b
│  │  ├─ 92
│  │  │  ├─ 1698e2973fc942ce5930d7a508d9dd20784fc5
│  │  │  ├─ 8ec2b7c2329ab14abdc7a9d6d8e0e6d0e7ce2b
│  │  │  ├─ 918f22c6a8776214beb2379cfb3ff6874bd554
│  │  │  └─ c87859c60300db65ee0ec1ba7b190f02d66ecf
│  │  ├─ 93
│  │  │  ├─ 53bdde37b5130fdf3a18ac72d1f6c8a67a155e
│  │  │  ├─ 63f9a1aee3f9ebacef5ddb4983d039b73c9955
│  │  │  └─ 8fb3ac96e2250a362480c3409046954cf7e93b
│  │  ├─ 94
│  │  │  └─ aed392be053082984e307c9fb226b3121cc119
│  │  ├─ 95
│  │  │  ├─ 2fee855bb397fb28a7a6f2a0f9b11c3fae868a
│  │  │  └─ 92bebb0113697a54b031c16d4fea35fab7e4c4
│  │  ├─ 97
│  │  │  ├─ 24e03ea0aa9e04ac544248400721f66cf385ac
│  │  │  └─ 9196777577fea3cbd1788e6ed4c1da4e6b7ac6
│  │  ├─ 98
│  │  │  └─ aadf7ee3a16fe90d597758c26740ec914556cc
│  │  ├─ 99
│  │  │  ├─ 1369a4226b8693f052ec9101b238398f68e19e
│  │  │  └─ fe27064879bd6f17fa0954d2936495bdcc89f2
│  │  ├─ 9a
│  │  │  ├─ b19577b6fc3633536ca33860ba8f65ba00bd4e
│  │  │  └─ c3c906cd7dadc93e5fa2e46274265d256f8341
│  │  ├─ 9b
│  │  │  ├─ 60483f8a98d48e903a38c962766de7bd6d350d
│  │  │  └─ d7e7d236f8ce1bdcd96a1b0c162f107d087013
│  │  ├─ 9c
│  │  │  └─ 244b3b3f1f28e8f734c43f5b6ce86407d5f356
│  │  ├─ 9d
│  │  │  ├─ b7baa18ba50a5b9eccfc42a260dfc49ee14ea6
│  │  │  ├─ bcacce7fda38fe55f001f545a1881c7549ece0
│  │  │  └─ d1cab77d8e56a03b1f7c2428877ae72b434227
│  │  ├─ 9e
│  │  │  ├─ 54366d1ef67b04d9e07c4e5d853a016801e0b6
│  │  │  ├─ 8892e898d61cebf061b404b3b5545c63cbfb83
│  │  │  └─ fe0da7c800bb80e024d96ac259c6630e3c7373
│  │  ├─ a0
│  │  │  └─ 8ed9a2104c11f29b57754b797e0f3567174097
│  │  ├─ a1
│  │  │  └─ 1889d0cf11c6e135c0fb1934e5dd7e5e99a56c
│  │  ├─ a2
│  │  │  ├─ 80c5a689b3c5b476a6f1b200516ed4ecdbb400
│  │  │  └─ a156931377c2a615b1cd94f3f22574a59438dd
│  │  ├─ a3
│  │  │  ├─ 63173a441436d3ca43e489a49fccdfa54b796a
│  │  │  └─ dda0aa9996021722c38fce5a8f9f2d34e2adbc
│  │  ├─ a5
│  │  │  └─ cb2c1f7846b652f0d9e827145b213e9c90d887
│  │  ├─ a6
│  │  │  ├─ 340a032eebef2d97532462b91a452173439eec
│  │  │  └─ 6a82217323f811cff14ebf32db48172ae85236
│  │  ├─ a7
│  │  │  └─ 53a468fd4565b7515424fb5f9741d1096900bc
│  │  ├─ aa
│  │  │  └─ 5cb6e0d147858602fad087d2ce11691abd94d3
│  │  ├─ ab
│  │  │  ├─ 11b5274e36a9c077678485d1ec18309d1dd393
│  │  │  ├─ 85e7408affb2f737c8182e0394066d9e5e08d2
│  │  │  └─ d8cb54900d0bbc0efb1e3af0d1e05902afc854
│  │  ├─ ae
│  │  │  ├─ 6903f24e60ecdde09cdbefa6cf0d8cb6b12453
│  │  │  ├─ cfea3abe54ff5dc9d08a5b5ef6804f454fdb17
│  │  │  └─ d659ad548f730993e074611f465c517f2e5c42
│  │  ├─ af
│  │  │  └─ d2a63add967e690077df8b0e0aecf17755b183
│  │  ├─ b0
│  │  │  ├─ 7de6cee9ddfb2ecbf774a0ab7d27d0b16dab61
│  │  │  └─ c93649b0c4b6e939d0c9457e6ea4358895e6d6
│  │  ├─ b1
│  │  │  └─ 3d764d4a83ee91448d8ad86670d3e91f476aa9
│  │  ├─ b2
│  │  │  ├─ 1c990768d7099679b95c545ab4b982c91d821a
│  │  │  ├─ 25a09b4c585e5186822b2b48318480e0efc8cc
│  │  │  └─ 350b5d0dc875e8702c01c44433de2e9c21e9c5
│  │  ├─ b3
│  │  │  └─ 4c20c151de31a79fbe15e608340941256324a4
│  │  ├─ b4
│  │  │  ├─ 45760695e8a236a24e3ec26390d426129003bc
│  │  │  └─ 93703a209783f7ae4844f7e32cca268f1035dc
│  │  ├─ b5
│  │  │  └─ 27ebe282d91e23d3963a2b49ef01831e76af98
│  │  ├─ b6
│  │  │  ├─ 2de577c5a86d27f1da3ce0d286bac118def54c
│  │  │  └─ dadb34ddc874b47d0dcbf80cb97f8192ee4397
│  │  ├─ b8
│  │  │  ├─ e64cada17da2e22fe1975ed1c59715b1d293df
│  │  │  └─ e856d0ca381995a410c928d27411c18c2fc54b
│  │  ├─ b9
│  │  │  └─ 2bc12ecd7ef88000c31f39b6423d67a3cef214
│  │  ├─ ba
│  │  │  ├─ 3d7c501e7a855a45fa4d313a504a7d2e7b4ee5
│  │  │  └─ 6c25836c0d0e016009334be1d464f1de35c929
│  │  ├─ bc
│  │  │  ├─ 537bb059259f1f534c7daef85edaf96d9e836e
│  │  │  └─ 8bbd5f7696aafd4e631f33159cb21b594cae0d
│  │  ├─ bd
│  │  │  └─ aa54c6de3b0e89db6cf585a42a37d67139e275
│  │  ├─ be
│  │  │  ├─ 9f8abb18d808d1f555a5608170d6f315db684e
│  │  │  └─ c3fb3134513dc1da156bc0311d86e3fd486db5
│  │  ├─ bf
│  │  │  ├─ a19754ea9635a2349dc56587480fb96ee9b892
│  │  │  ├─ b6e4ff2276bd0233b7658cbfb2c1af638935ef
│  │  │  └─ f2150f0b1c37026e0983808b1168e779b05588
│  │  ├─ c0
│  │  │  ├─ 0e0e6f2ad37e332bcbdcdcd5b9e53c5c7b03f8
│  │  │  └─ f614d6fab130170a938f63d2e1f28119ab2cdd
│  │  ├─ c2
│  │  │  └─ 15ca2b1b884eae36441cfd10b8541a4709c9a4
│  │  ├─ c3
│  │  │  └─ 6e6817a86ae4807fd7de8fae7d06046015c429
│  │  ├─ c4
│  │  │  └─ d2e00c8dd71c28702f761261073b98ea6de4b3
│  │  ├─ c7
│  │  │  └─ dacea01cacb185e4a44110f0e5e237fd29da08
│  │  ├─ c8
│  │  │  ├─ 39992669be4615b3bc08029d9506a308c44c1c
│  │  │  ├─ 5d5c9ccfe88abd2a9d4409ac175cab8523c4a6
│  │  │  └─ 9e045801589c49462a79bd89bb2dd2a9c589eb
│  │  ├─ c9
│  │  │  ├─ 0640aa86d71ab5f624f1d0f210e23c5b6072bf
│  │  │  ├─ 5575447b7fae3436c58d69b52096f2076ceefd
│  │  │  └─ 96180d738e92adb476132ebb6ca8f189fdce98
│  │  ├─ ca
│  │  │  ├─ 05b88cba450e8ef622a182e8b7cc1a91d966d4
│  │  │  ├─ 67fe8dbbfe0eb6d8750e41f9fa830f2f8b756c
│  │  │  ├─ 72a7020e90ca74f4e9cd2f45f63ac2a1e14ff7
│  │  │  ├─ ae4810ac2f94fd6a5d0dfb7c96b6ba606c5699
│  │  │  └─ bfc368876a42e6eaa8f9522defa7be1a8987c3
│  │  ├─ cc
│  │  │  ├─ 7e3b14ae185bc1d3aa640b219d1cdbe12a1680
│  │  │  ├─ b3a243cb3be74c22fc690a5c44214f22626199
│  │  │  └─ cba677ffbd0f835858b63c1d0dc1775afbee59
│  │  ├─ cd
│  │  │  ├─ abca40f5fb0ac78c722015cb050df38229c408
│  │  │  └─ c0ccecddf2be94edec1817bcda4717c8120f16
│  │  ├─ ce
│  │  │  └─ 173b516732cf75135a2445e6e43a32578ac714
│  │  ├─ cf
│  │  │  ├─ a41bf974bc1872faba313f250715e6942ead7c
│  │  │  └─ dae4e0ae95ff543c1b136fc8cf9eb6187d98c6
│  │  ├─ d0
│  │  │  ├─ 2b878eb3e2aeef374572225a1b649f3d115392
│  │  │  └─ bd456086b284928f4e566393e697ffda7101ce
│  │  ├─ d2
│  │  │  ├─ 9491bfb589af780a0b83808ecbae82d32050bc
│  │  │  ├─ addb8969ed901430c45a475e2fef2efac85d9b
│  │  │  └─ f0f84a4605d24b03235254b46d2c54f5e13b9f
│  │  ├─ d4
│  │  │  └─ aead788b40e5c14a71f81bc8da9b767c4984d6
│  │  ├─ d5
│  │  │  └─ f356592f5470b7660db30fdeca767d8d22fdf9
│  │  ├─ d6
│  │  │  └─ abf85a8132429a458fdbf25a6e0e5363aab20d
│  │  ├─ d7
│  │  │  └─ 84448c62ccd3122e4c450eac876c9f9dbdecc1
│  │  ├─ d8
│  │  │  └─ 0344ee1e241a3ba30f45497341f4a884a85ccf
│  │  ├─ d9
│  │  │  └─ 6287959bd76b773030368408b31acb6767cb31
│  │  ├─ db
│  │  │  └─ 89cfa1b8e0fb9d38be9098c30f0ab91798c7f5
│  │  ├─ dc
│  │  │  ├─ 22e51da6dc5182024397ebc1adca991460b90b
│  │  │  ├─ 996d176b53f77aea2306c93dcfb443feb2c07a
│  │  │  ├─ b486a47b53cb85ba8df01acbfac6df70381b9e
│  │  │  └─ d57f45722a4c390c83e5c806bc48d7420fee02
│  │  ├─ dd
│  │  │  └─ 91f680f2872f7f2c383d95f9b4f0757890174c
│  │  ├─ de
│  │  │  └─ f1336f9d5c3db818721157ac71df2b40ad80ef
│  │  ├─ df
│  │  │  ├─ aff1a0b57cc577c49b6f86b9bba9deb01d4356
│  │  │  ├─ bc2533ffd393e47ee238f324bfbcd6afda8f75
│  │  │  └─ f8ab0ce3cb98d2339e4db53c6a57864524e789
│  │  ├─ e0
│  │  │  └─ 99383f27e277e30990db51bf266fd7089f3347
│  │  ├─ e1
│  │  │  ├─ a01a43a302480816b4accd00073134c632f493
│  │  │  └─ f4e80d67b4d216be16511a3729ffec720a4462
│  │  ├─ e3
│  │  │  └─ f29287cfe7ef4513cad140a0773be35c209787
│  │  ├─ e4
│  │  │  ├─ 63755f75410447711dbbd6739f8383f15309a7
│  │  │  └─ 886f5dbfa4379098054bc88369d1c216ff86d8
│  │  ├─ e5
│  │  │  ├─ 18d560cd9215cc743a08f38416949c8cacbd6b
│  │  │  ├─ a969382fec7c28545159c82d090be6e044dc0e
│  │  │  └─ eabd6c35e83ecfc96ead3b9466b5c2c72cd36c
│  │  ├─ e6
│  │  │  ├─ 2ef181ac5f46558bf8b6104d036014270c0be3
│  │  │  ├─ 8ac2fc717d18ec2d14a46e71b3d7188d2d876d
│  │  │  └─ ac00f013aaa9abca6eee1a79cdec2c51d727a5
│  │  ├─ e7
│  │  │  ├─ 5fe42177134323abfc6561730714d800d7eee6
│  │  │  └─ 72c5888b4e3d14e0bdb2de454fd31a4ae11658
│  │  ├─ e8
│  │  │  ├─ 3627376b46efd96063dc7a00869779b6597230
│  │  │  └─ c0328d518d6d55ba6afccbacaf4e9f0f4e63bd
│  │  ├─ e9
│  │  │  ├─ d5c5a3162eb960a4ee3a835a74a62c97fd6674
│  │  │  └─ ed23b0eeae6f604c51136ea06a602d3278bbaf
│  │  ├─ ea
│  │  │  ├─ 176e947169ae9554d52fea466dc0cd5cfb494e
│  │  │  ├─ 442eb668e94910ea9529c0888aaad2100928d2
│  │  │  └─ 84e71859a2125e4e3b6b3f5c933dce31a42f7b
│  │  ├─ f0
│  │  │  ├─ 0fddff0e94dabf2725cbc8f117e76bdf2b5f72
│  │  │  ├─ 42a9703464d92aec07cd1727fdf7cadcee9bd8
│  │  │  └─ 61e499212849603d336502aa84fe4b99732909
│  │  ├─ f2
│  │  │  ├─ 2a20a1cbdcb400d440c969bdab8e60fcfb085a
│  │  │  └─ dbd1bcbb0df76f594af8bf6277ff8f94ec18ae
│  │  ├─ f3
│  │  │  └─ 886f919d7d8343ec872c6622203ba5cb7bcf24
│  │  ├─ f4
│  │  │  ├─ 017e33003fbc52b8b4848a9c91e6bd99f76424
│  │  │  └─ 1d551d4e56e60e4b9c8c1822dc8654de50d4b1
│  │  ├─ f5
│  │  │  ├─ 2d704d5e0ae8c6a9a230d4f780dca81244235d
│  │  │  └─ e101d7ec31c3a8c803ca280e115e8900224169
│  │  ├─ f6
│  │  │  └─ c8f1e9dc96b4c3c250073de7bda4c8a91a4dac
│  │  ├─ f7
│  │  │  ├─ 5653587b49f10fe99aca7c916b631d57ba4ca6
│  │  │  ├─ d3987d8789ff4801e2ccc7d1fca95be572aa08
│  │  │  └─ da876da275e9ccd64d8194a6c11b1565206a86
│  │  ├─ f8
│  │  │  ├─ 211ec3c859c93bc8ecc8f093163c873f631735
│  │  │  ├─ 229a6ba200d22f01aa8f9a22764068ffbe7d97
│  │  │  ├─ 67da8d319dc79cfbfa97c8ed387f7c188ae944
│  │  │  ├─ 6c6ffed23e3ec887501633d3d6df2dd5e791ff
│  │  │  ├─ a44c33cb80e2b5701eb8be7e2e3c0b4c96661c
│  │  │  └─ d6384aa3b31471e3ef572caefaf81ff52faa34
│  │  ├─ f9
│  │  │  ├─ 0fc34ee91510b03b49f699a807b5b440e46e5f
│  │  │  ├─ f1494e43f6899c640ddd9b10fe1fc0cfde9f30
│  │  │  └─ faf08e2e8de048c981f0afa1d2839ac2df39a4
│  │  ├─ fa
│  │  │  └─ a71d1d49f1a7895eb01f212f3cc133ccb64abd
│  │  ├─ fb
│  │  │  └─ 080628c13c9cf081ea304545ab56febce4eacf
│  │  ├─ fc
│  │  │  ├─ 58cd50e83de96a1f33416ecd4f19aafdd06e7e
│  │  │  ├─ 6010956e0f44291f1c26f03cc0f9da3e123fc7
│  │  │  └─ bcd05c3e2c40f40d152b2b6d8f3b4d3c06fb0c
│  │  ├─ fd
│  │  │  └─ e4c8631c36b0a34c5106b1e6f47dfabdf59b1f
│  │  ├─ fe
│  │  │  └─ f32ea329b87f22d7006c636b5a5a2c81e0d6a4
│  │  ├─ ff
│  │  │  ├─ 2d19303fbcbb8ddc700480443f6d9d0298203f
│  │  │  └─ bb555156c4821bb3564418d42e4799e58cf6b2
│  │  ├─ info
│  │  └─ pack
│  │     ├─ pack-2daa3f3867bad4051e15c32fed3b60824ae8ba8d.idx
│  │     ├─ pack-2daa3f3867bad4051e15c32fed3b60824ae8ba8d.pack
│  │     ├─ pack-3db4b81b5925b8e3c32dad639a4cace865d161a8.idx
│  │     ├─ pack-3db4b81b5925b8e3c32dad639a4cace865d161a8.pack
│  │     ├─ pack-c3d6bd04d8e921661b1eb9291f1f829ca0881eb7.idx
│  │     ├─ pack-c3d6bd04d8e921661b1eb9291f1f829ca0881eb7.pack
│  │     ├─ pack-e7e16fb53906ea5a6e458b7fed33d3ab9f0a6002.idx
│  │     └─ pack-e7e16fb53906ea5a6e458b7fed33d3ab9f0a6002.pack
│  ├─ ORIG_HEAD
│  ├─ packed-refs
│  └─ refs
│     ├─ heads
│     │  ├─ animationFicheProfil
│     │  ├─ dev
│     │  ├─ ficheMailing
│     │  ├─ ficheProfil
│     │  ├─ fix
│     │  ├─ fixPHPCS
│     │  ├─ main
│     │  └─ remasterFiche
│     ├─ remotes
│     │  └─ origin
│     │     ├─ animationFicheProfil
│     │     ├─ dev
│     │     ├─ ficheProfil
│     │     ├─ fix
│     │     ├─ fixPHPCS
│     │     ├─ HEAD
│     │     └─ remasterFiche
│     ├─ stash
│     └─ tags
├─ .github
│  └─ workflows
│     ├─ deploy-traefik.yml
│     └─ main.yml
├─ .gitignore
├─ assets
│  ├─ app.js
│  ├─ bootstrap.js
│  ├─ bundle-app.js
│  ├─ controllers
│  │  └─ hello_controller.js
│  ├─ controllers.json
│  ├─ Deck.js
│  ├─ GamePlay.js
│  ├─ GameUI.js
│  ├─ images
│  │  ├─ adresse.png
│  │  ├─ bigFavicon.png
│  │  ├─ cedric.jpg
│  │  ├─ degout.png
│  │  ├─ ennui.png
│  │  ├─ etonnement.png
│  │  ├─ facebook.png
│  │  ├─ Favicon.png
│  │  ├─ imgProfil.jpg
│  │  ├─ joie.png
│  │  ├─ Logo.png
│  │  ├─ mail.png
│  │  ├─ panier.png
│  │  ├─ satisfaction.png
│  │  ├─ tel.png
│  │  ├─ test.png
│  │  ├─ user.png
│  │  ├─ wave.svg
│  │  ├─ wavebackground.svg
│  │  ├─ Wine-Glass-alone.png
│  │  └─ wine.png
│  └─ styles
│     ├─ animations.scss
│     ├─ app.scss
│     ├─ blog.scss
│     ├─ boutique.scss
│     ├─ faq.scss
│     ├─ fiche-profil.scss
│     ├─ ficheEmail.scss
│     ├─ footer.scss
│     ├─ form.scss
│     ├─ globale.scss
│     ├─ lexique.scss
│     ├─ login.scss
│     ├─ memory.scss
│     ├─ popupmessage.scss
│     ├─ profil.scss
│     ├─ quizz.scss
│     ├─ shopcart.scss
│     ├─ showanimation.scss
│     └─ _wcs.scss
├─ bash.exe.stackdump
├─ bin
│  ├─ console
│  └─ phpunit
├─ captain-definition
├─ composer.json
├─ composer.lock
├─ config
│  ├─ bundles.php
│  ├─ packages
│  │  ├─ cache.yaml
│  │  ├─ debug.yaml
│  │  ├─ doctrine.yaml
│  │  ├─ doctrine_migrations.yaml
│  │  ├─ framework.yaml
│  │  ├─ mailer.yaml
│  │  ├─ messenger.yaml
│  │  ├─ monolog.yaml
│  │  ├─ notifier.yaml
│  │  ├─ reset_password.yaml
│  │  ├─ routing.yaml
│  │  ├─ security.yaml
│  │  ├─ sensio_framework_extra.yaml
│  │  ├─ translation.yaml
│  │  ├─ twig.yaml
│  │  ├─ uid.yaml
│  │  ├─ validator.yaml
│  │  ├─ vich_uploader.yaml
│  │  ├─ webpack_encore.yaml
│  │  └─ web_profiler.yaml
│  ├─ preload.php
│  ├─ routes
│  │  ├─ framework.yaml
│  │  ├─ ux_autocomplete.yaml
│  │  └─ web_profiler.yaml
│  ├─ routes.yaml
│  └─ services.yaml
├─ docker-compose.yml
├─ docker-entry.sh
├─ Dockerfile
├─ grumphp.yml
├─ migrations
│  ├─ .gitignore
│  ├─ Version20230605142401.php
│  ├─ Version20230606074947.php
│  ├─ Version20230606075047.php
│  ├─ Version20230607073638.php
│  ├─ Version20230607092844.php
│  ├─ Version20230607094908.php
│  ├─ Version20230607150740.php
│  ├─ Version20230614145036.php
│  ├─ Version20230615135616.php
│  ├─ Version20230622143842.php
│  ├─ Version20230626100114.php
│  └─ Version20230626102806.php
├─ nginx.conf
├─ package-lock.json
├─ package.json
├─ php.ini
├─ phpcpd.xml
├─ phpstan.neon
├─ public
│  ├─ assets
│  │  └─ images
│  │     ├─ ateliercreation.jpg
│  │     ├─ atelierdegustation.jpg
│  │     └─ profils
│  │        ├─ bonbon.png
│  │        ├─ chardo-ne.png
│  │        └─ terrien.png
│  └─ index.php
├─ README.md
├─ src
│  ├─ Controller
│  │  ├─ .gitignore
│  │  ├─ Admin
│  │  │  ├─ AtelierCrudController.php
│  │  │  ├─ BlogCrudController.php
│  │  │  ├─ CepageCrudController.php
│  │  │  ├─ DashboardController.php
│  │  │  ├─ FaqCrudController.php
│  │  │  ├─ UserCrudController.php
│  │  │  └─ VinCrudController.php
│  │  ├─ AdminWelcomeController.php
│  │  ├─ AnimationsController.php
│  │  ├─ AtelierController.php
│  │  ├─ BlogController.php
│  │  ├─ CartController.php
│  │  ├─ CepageController.php
│  │  ├─ FaqController.php
│  │  ├─ FicheDegustationController.php
│  │  ├─ HomeController.php
│  │  ├─ LexiqueController.php
│  │  ├─ LoginController.php
│  │  ├─ MemoryController.php
│  │  ├─ ProfilController.php
│  │  ├─ RecetteController.php
│  │  ├─ RegistrationController.php
│  │  ├─ ResetPasswordController.php
│  │  ├─ ShopController.php
│  │  ├─ UserController.php
│  │  └─ VinController.php
│  ├─ DataFixtures
│  │  ├─ AdminFixtures.php
│  │  ├─ AppFixtures.php
│  │  ├─ FaqFixtures.php
│  │  ├─ ProfilFixtures.php
│  │  ├─ UserFixtures.php
│  │  └─ VinFixtures.php
│  ├─ Entity
│  │  ├─ .gitignore
│  │  ├─ Animations.php
│  │  ├─ Atelier.php
│  │  ├─ Blog.php
│  │  ├─ Cepage.php
│  │  ├─ Faq.php
│  │  ├─ Favoris.php
│  │  ├─ FicheDegustation.php
│  │  ├─ Jeux.php
│  │  ├─ Note.php
│  │  ├─ Panier.php
│  │  ├─ Profil.php
│  │  ├─ Recette.php
│  │  ├─ ResetPasswordRequest.php
│  │  ├─ User.php
│  │  └─ Vin.php
│  ├─ Form
│  │  ├─ AnimationsType.php
│  │  ├─ AtelierType.php
│  │  ├─ BlogType.php
│  │  ├─ CepageType.php
│  │  ├─ ChangePasswordFormType.php
│  │  ├─ ContactForm.php
│  │  ├─ FaqType.php
│  │  ├─ FicheDegustationType.php
│  │  ├─ ProfilType.php
│  │  ├─ RecetteType.php
│  │  ├─ RegistrationFormType.php
│  │  ├─ ResetPasswordRequestFormType.php
│  │  ├─ SearchVinType.php
│  │  ├─ UserType.php
│  │  └─ VinType.php
│  ├─ Kernel.php
│  ├─ Repository
│  │  ├─ .gitignore
│  │  ├─ AnimationsRepository.php
│  │  ├─ AtelierRepository.php
│  │  ├─ BlogRepository.php
│  │  ├─ CepageRepository.php
│  │  ├─ FaqRepository.php
│  │  ├─ FavorisRepository.php
│  │  ├─ FicheDegustationRepository.php
│  │  ├─ JeuxRepository.php
│  │  ├─ NoteRepository.php
│  │  ├─ PanierRepository.php
│  │  ├─ ProfilRepository.php
│  │  ├─ RecetteRepository.php
│  │  ├─ ResetPasswordRequestRepository.php
│  │  ├─ UserRepository.php
│  │  └─ VinRepository.php
│  ├─ Security
│  │  └─ LoginFormAuthenticator.php
│  └─ Service
│     ├─ CartShopService.php
│     └─ MailerService.php
├─ symfony.lock
├─ templates
│  ├─ animations
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  └─ _form.html.twig
│  ├─ atelier
│  │  ├─ edit.html.twig
│  │  ├─ ficheProfil.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ resume.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ base.html.twig
│  ├─ baseEmail.html.twig
│  ├─ base_degustation.html.twig
│  ├─ blog
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ visiteur.html.twig
│  │  ├─ visiteurshow.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ cepage
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ degustation
│  │  └─ index.html.twig
│  ├─ faq
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ visiteur.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ ficheEmail.html.twig
│  ├─ fiche_degustation
│  │  ├─ creationFiche.html.twig
│  │  ├─ edit.html.twig
│  │  ├─ ficheDegustation.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ histoire
│  │  └─ histoire.html.twig
│  ├─ home
│  │  └─ index.html.twig
│  ├─ lexique
│  │  └─ index.html.twig
│  ├─ memory
│  │  └─ index.html.twig
│  ├─ mentions
│  │  └─ mentions.html.twig
│  ├─ newContactMail.html.twig
│  ├─ profil
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ profil.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ recette
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ visiteur.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ registration
│  │  └─ register.html.twig
│  ├─ reset_password
│  │  ├─ check_email.html.twig
│  │  ├─ email.html.twig
│  │  ├─ request.html.twig
│  │  └─ reset.html.twig
│  ├─ security
│  │  └─ login.html.twig
│  ├─ shop
│  │  ├─ index.html.twig
│  │  └─ shopCart.html.twig
│  ├─ user
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ vin
│  │  ├─ edit.html.twig
│  │  ├─ index.html.twig
│  │  ├─ new.html.twig
│  │  ├─ show.html.twig
│  │  ├─ _delete_form.html.twig
│  │  └─ _form.html.twig
│  ├─ _footer.html.twig
│  ├─ _navbar.html.twig
│  ├─ _navbar_backoffice.html.twig
│  └─ _popUpMessage.html.twig
├─ tests
│  ├─ .gitignore
│  └─ bootstrap.php
├─ translations
│  └─ .gitignore
├─ webpack.config.js
└─ yarn.lock

```