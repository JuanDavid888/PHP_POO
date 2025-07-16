# Php

## Instalación y alistamiento del Entorno con Dev Container

El desarrollo moderno en PHP ha evolucionado más allá de simplemente escribir código en un editor. Hoy en día, es fundamental contar con entornos aislados, reproducibles y portables. Para ello, Visual Studio Code junto con `Dev Containers` permite a los estudiantes trabajar en un entorno de desarrollo homogéneo, sin importar el sistema operativo que usen.

### 1. Alistamiento de VS Code

Para el perfil de desarrollo de `Code` e  instalar las extensiones necesarias.

1. Dev Container → *Permite abrir cualquier carpeta dentro de un contenedor Docker.*

### 2. Alistamiento y Configuración de Dev Container

Abre una carpeta nueva para tu proyecto PHP. 

```bash
mkdir php-dev-container
cd php-dev-container
```

En VS Code, presiona `F1` o `Ctrl+Shift+P` y selecciona:

> **Dev Containers: Add Dev Container Configuration Files...**
>
> **Add configuration to workspace**

1. Elige **PHP**

2. Selecciona la versión deseada (por ejemplo PHP 8.2)
3. Marca las siguientes `Features` para el contenedor:
   - Compose (via Github Releases) - devcontainers-extra 
   - Github CLI - devcontainers

3. Marca las extensiones que quieres incluir dentro del contenedor:

   - PHP Debug

   - PHP IntelliSense

   - PHP Extension Pack

   - Conventional Commits

El paso anterior generará una estructura como la siguiente:

```text
.devcontainer/
├── devcontainer.json
├── Dockerfile

```

### 3. Personalización del Contenedor

Edita el archivo `.devcontainer/devcontainer.json` para asegurar que todo esté listo:

```json
{
	"name": "PHP",
	"image": "mcr.microsoft.com/devcontainers/php:1-8.2-bullseye",
	"customizations": {
		"vscode": {
			"settings": {
				"terminal.integrated.shell.linux": "/bin/bash",
				"php.validate.executablePath": "/usr/local/bin/php",
				"php.suggest.basic": false,
				"editor.formatOnSave": true
			},
			"extensions": [
				"felixfbecker.php-debug",
				"bmewburn.vscode-intelephense-client",
				"esbenp.prettier-vscode",
				"vivaxy.vscode-conventional-commits"
			]
		}
	},
	// Use 'forwardPorts' to make a list of ports inside the container available locally.
	"forwardPorts": [
		8080
	],
	"features": {
		"ghcr.io/devcontainers/features/github-cli:1": {},
		"ghcr.io/devcontainers-extra/features/composer:1": {}
	}
}

```

### 4. Abrir el Dev Container

Una vez mostrada la notificación para la ejecución del Dev container seleccione la opción `Reopen in Container`.

<img src="https://i.ibb.co/8D1B3HC3/Screenshot-2025-07-06-at-8-51-28-PM.png" alt="Screenshot-2025-07-06-at-8-51-28-PM" border="0">

### 5. Ejecución de mi primer Script PHP

#### Estructura

```tex
php-devcontainer/
├── .devcontainer/
│   ├── devcontainer.json
│   └── Dockerfile
├── index.php
├── README.md
```

##### `README.md`

````markdown
# 🧰 Entorno de Desarrollo PHP con Dev Container

Este proyecto configura automáticamente un entorno PHP utilizando Dev Containers de VS Code.

## 🚀 Pasos para ejecutar

1. Abre este proyecto en **Visual Studio Code**.
2. Asegúrate de tener Docker instalado y corriendo.
3. Presiona `F1` y elige: `Dev Containers: Reopen in Container`.

##  Ejecutar archivo `index.php` en terminal

```bash
php index.php
```
```bash
php -S 0.0.0.0:8080
```

````

### 6. Abrir en el Navegador

![](https://camo.githubusercontent.com/5fc027dab8db34f867d0310f160f2cd38ca4927c0f97fdb8aca2ab37cd56a4b8/68747470733a2f2f692e6962622e636f2f7a563730764d77342f696d6167652e706e67)