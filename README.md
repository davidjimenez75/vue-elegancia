# vue-elegancia

Sandbox for the book "La Elegancia de Vue.js 3", spanish version from the "The Majesty of Vue.js 3" book.

- https://leanpub.com/vuejs3



## INSTALLATION OF DEPENDENCIES WITH YARN


### LINUX

Clone repo from GitHub:

```bash
sudo -u www-data git clone https://github.com/davidjimenez75/vue-elegancia.git
```

Install dependencies with Yarn:

```bash
sudo -u www-data yarn add axios bootstrap vue vuex vue-resource
sudo -u www-data yarn install
```


### WINDOWS

Clone repo from GitHub:

```
git clone https://github.com/davidjimenez75/vue-elegancia.git
```

Install dependencies with Yarn:

```
yarn add axios bootstrap vue vuex vue-resource
yarn install
```


### BOWER INSTALLATION (DEPRECATED)

Install dependencies with bower.

```bash
sudo -u www-data bower install
```






## FAQ

### How install Yarn in Debian/Ubuntu?

YARN - STABLE VERSION:

https://yarnpkg.com/en/docs/install#debian-stable

```
apt install curl
curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list
sudo apt update && sudo apt install yarn
yarn -v
```

YARN - RELEASE CANDIDATE:

https://yarnpkg.com/en/docs/install#debian-rc

```
apt install curl
curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
echo "deb https://dl.yarnpkg.com/debian/ rc main" | sudo tee /etc/apt/sources.list.d/yarn.list
sudo apt update && sudo apt install yarn
yarn -v
```

### Add color to folders?

Copy one of the root folder *.txt files inside the subfolder.

 - danger.txt (red)
 - warning.txt (orange)
 - info.txt (light blue)
 - primary.txt (blue)
 - success.txt  (green)


### Add small description to folders?

Create an index.txt file with your comments.
