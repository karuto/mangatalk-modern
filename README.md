# mangatalk-twentynineteen

<img width="400" alt="Screen Shot 2019-07-20 at 14 54 09" src="https://user-images.githubusercontent.com/1095291/61584548-7140d480-aafe-11e9-9cc3-d8458b3624ad.png">

漫言模板，或称漫言主题、漫言前端，英文项目名为 mangatalk-twentynineteen，是一个 WordPress 主题，驱动着漫画媒体网站[「漫言 MangaTalk」](http://mangatalk.net)的所有前端页面。漫言主题的作者是 [Karuto](httsp://github.com/karuto)，这个模板系统自 2012 年初版上线起几经大改，目前最新一版是基于 [Karuto 的父主题系统]（https://github.com/karuto/karuto-starter-theme)（一个基于 WordPress 官方模板 [Twenty Nineteen](https://wordpress.com/theme/twentynineteen) 的 衍生版）改造而成，因此英文名称跟随官方模板，以发布的年份标记。

本软件基于 GPL v3 通用公共许可协议发布，开发者不承担延用后产生的任何法律责任。

## 本地开发环境搭建

1. 搭建一个 WordPress 博客的本地开发环境。请遵循 WordPress 官方的常规指示，直到你可以正常访问本地博客的首页和后台为止。

2. 获取漫言开发用数据库备份，将你在第一步新建的 WordPress 数据库覆盖。

3. 进入 `wp_options` 数据表，将 `siteurl` 和 `home` 两项改为你的本地开发环境地址，如 `http://localhost:3000`。

4. 使用 `git clone` 将本项目拷贝至 `wp_contents/themes` 目录下。拷贝后的项目文件夹名称必须是 `mangatalk-twentynineteen`。

5. 本地开发环境搭建完毕。确认你可以正常访问本地博客的首页和后台。

## 使用漫言模板

### 环境需求

在对漫言模板进行修改和开发之前，需要确保 `node 8` 和 `npm 4` 已被正常安装。

### 安装依赖包

```bash
npm install
```

### CSS 开发

漫言模板使用 `Sass` 预处理器进行 CSS 的开发和编译。本地开发或修改 CSS，需要在 `sass/` 目录下进行。

修改后，对 CSS 进行一次性的编译：
```bash
npm run build
```

这将会在项目根目录下生成编译后的单个 CSS 文件，`style.css`，以及相关的 sourcemap。`style.css` 会被保存到 git 的版本历史中，因此在生产环境（production environment）中无需再进行即时的 CSS 编译。

注：如果你在开发过程中切换了 `node` 的版本，请执行以下命令，将 `node-sass` 依赖包重新组建，否则编译将会出现问题：
```bash
npm rebuild node-sass
```

漫言模板提供对 `Sass` 文件的实时监听与自动重载，便于本地开发：
```bash
npm run watch
```

#### PHP 开发

漫言模板，如同所有 WordPress 模板主题一样，使用 PHP 作为驱动模板和后端的语言。

漫言模板组织 PHP 代码的理论与思路，请见 [Karuto 的父主题系统的文档]（https://github.com/karuto/karuto-starter-theme/blob/master/README.md)。

### 其他问题

请联系本项目作者 [Karuto](httsp://github.com/karuto)，或来信至 hi@mangatalk.net。
