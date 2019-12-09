# La-Elegancia-de-Vue.js-2

Sandbox for the book "La Elegancia de Vue.js 2", spanish version from the "The Majesty of Vue.js 2" book.


## INSTALLATION

Download from GitHub and install dependencies with yarn.

```bash
sudo -u www-data yarn add axios bootstrap vue vuex vue-resource
sudo -u www-data yarn install
```



### BOWER INSTALLATION (DEPRECATED)

Install dependencies with bower.

```bash
bower install
```



## FAQ

### How can install Yarn in Debian/Ubuntu?

```
apt install curl
curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
echo "deb https://dl.yarnpkg.com/debian/ rc main" | sudo tee /etc/apt/sources.list.d/yarn.list
sudo apt update && sudo apt install yarn
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
