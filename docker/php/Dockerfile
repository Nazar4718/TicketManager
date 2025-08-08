FROM php:8.3-fpm

# Install system dependencies for Debian-based images (apt-get)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    pkg-config \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Add NodeSource repository for Node.js 16
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Verify Node.js version
RUN node -v && npm -v

# Upgrade npm to version 8
RUN npm install -g npm@8

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip soap

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory and copy application files
WORKDIR /var/www
COPY . /var/www/

# Copy entrypoint script and make it executable
COPY ./docker/php/php-entrypoint.sh /php-entrypoint.sh
RUN chmod +x /php-entrypoint.sh

# Set entrypoint and command
ENTRYPOINT ["/php-entrypoint.sh"]

CMD ["php-fpm"]
