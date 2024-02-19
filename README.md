# UserFrosting 5.0 - Vue.js Demo

![PHP Version](https://img.shields.io/badge/php-%5E8.0-brightgreen)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
[![Join the chat at https://chat.userfrosting.com/channel/support](https://chat.userfrosting.com/api/v1/shield.svg?name=UserFrosting)](https://chat.userfrosting.com/channel/support)
[![Build](https://github.com/userfrosting/demo-vue/workflows/Build/badge.svg?branch=main)](https://github.com/userfrosting/demo-vue/actions?query=workflow%3ABuild)
[![Codecov](https://codecov.io/gh/userfrosting/demo-vue/branch/main/graph/badge.svg)](https://codecov.io/gh/userfrosting/demo-vue)
[![Style](https://github.styleci.io/repos/689461212/shield?branch=main&style=flat)](https://github.styleci.io/repos/689461212)
[![PHPStan](https://img.shields.io/github/actions/workflow/status/userfrosting/demo-vue/PHPStan.yml?branch=main&label=PHPStan)](https://github.com/userfrosting/demo-vue/actions/workflows/PHPStan.yml)
[![Donate](https://img.shields.io/badge/Donate-Buy%20Me%20a%20Coffee-blue.svg)](https://ko-fi.com/lcharette)
<!-- [![Latest Version](https://img.shields.io/github/v/release/userfrosting/userfrosting?include_prereleases&sort=semver)](https://github.com/userfrosting/UserFrosting/releases) -->
<!-- [![Backers on Open Collective](https://opencollective.com/userfrosting/backers/badge.svg)](#backers) -->
<!-- [![Sponsors on Open Collective](https://opencollective.com/userfrosting/sponsors/badge.svg)](#sponsors) -->
<!-- [![Donate](https://img.shields.io/badge/Open%20Collective-Donate-blue.svg)](https://opencollective.com/userfrosting#backer)  -->

[https://www.userfrosting.com](https://www.userfrosting.com)

This is demo of a [Vue.js](https://vuejs.org) single page app working on [UserFrosting 5](https://github.com/userfrosting/UserFrosting/tree/develop-5.0#userfrosting-50) and [UiKit](https://getuikit.com).

## By [Louis Charette](https://bbqsoftwares.com)

Copyright (c) 2023, free to use in personal and commercial software as per the [license](LICENSE.md).

## Documentation

### Installation

1. Clone repo
```
git clone https://github.com/userfrosting/demo-vue.git
```

2. Composer Install
```
composer install
```

3. Bake _(Tip: Use Sqlite file database for rapid local install)_
```
php bakery bake
```

4. Serve locally
```
php -S localhost:8888 -t public 
```

Assets can be build using Bakery or Npm directly:
```
php bakery webpack

// or

npm run dev
```

_More coming soon !_

## Screenshot

![](.github/screenshots/Screenshot_1.png)
![](.github/screenshots/Screenshot_2.png)
![](.github/screenshots/Screenshot_3.png)
![](.github/screenshots/Screenshot_4.png)

<!-- ### [Learning UserFrosting](https://learn.userfrosting.com) -->

<!-- ### [API documentation](http://api.userfrosting.com) -->

## [Change log](CHANGELOG.md)

<!--## Running tests

 Run `php bakery test` from the root project directory. Any tests included in `sprinkles/*/tests` will be run. -->
