1. Verificar o serviço PostgreSQL local

```bash
sudo lsof -i -P -n | grep LISTEN
```

2. Desativar temporariamente 

```bash
sudo systemctl stop postgresql
```