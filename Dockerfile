FROM alpine:latest

# Install PHP + JSON support + wget
RUN apk add --no-cache \
    php \
    php-cli \
    php-json \
    wget

WORKDIR /app

# Download all project files (NO COPY)
RUN wget -O urls.json https://raw.githubusercontent.com/bxbzzbbbm-cmyk/super-duper-waddle/refs/heads/main/urls.json && \
    wget -O search.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/super-duper-waddle/refs/heads/main/search.php && \
    wget -O list.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/super-duper-waddle/refs/heads/main/list.php && \
    wget -O go.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/super-duper-waddle/refs/heads/main/go.php && \
    wget -O create.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/super-duper-waddle/refs/heads/main/create.php

# Make JSON writable for link storage
RUN chmod 777 urls.json

EXPOSE 8000

# Start PHP server
CMD ["php", "-S", "0.0.0.0:8000"]
