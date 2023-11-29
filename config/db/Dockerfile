FROM mysql:8.0.28

RUN { \
        echo '[mysqld]'; \
        echo 'character-set-server=utf8mb4'; \
        echo 'collation-server=utf8mb4_general_ci'; \
        echo '[client]'; \
        echo 'default-character-set=utf8mb4'; \
    } > /etc/mysql/conf.d/charset.cnf

RUN { \
        echo '[client]'; \
        echo 'user = dukes'; \
        echo 'password = dukes'; \
        echo 'host = 127.0.0.1'; \
    } > /root/.mylogin.cnf && \
    chmod 600 /root/.mylogin.cnf

