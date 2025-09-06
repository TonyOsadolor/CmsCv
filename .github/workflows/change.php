name: 🚀 Deploy to cPanel via FTP

on:
  push:
    branches:
      - main  # or your deployment branch

jobs:
  ftp-deploy:
    name: 📦 FTP Deploy
    runs-on: ubuntu-latest

    steps:
      - name: 🔄 Checkout Code
        uses: actions/checkout@v3

      - name: 📤 Deploy via FTP
        uses: SamKirkland/FTP-Deploy-Action@v4.3.4
        with:
          server: ${{ secrets.FTP_SERVER }}
          username: ${{ secrets.FTP_USERNAME }}
          password: ${{ secrets.FTP_PASSWORD }}
          local-dir: ./
          server-dir: "/${{ secrets.PUBLIC_FOLDER }}/${{ secrets.PROJECT_PATH }}/"
          timeout: 200000
          exclude: |
            .git*
            README.md
            node_modules/
            .editorconfig
            .gitattributes
            .gitignore

      - name: 🚨 Trigger Laravel post-deploy hook
        run: 'curl -X POST {{ secrets.PROJECT_URL }} \ -H "Authorization: Bearer ${{ secrets.DEPLOY_TOKEN }}"'