FROM nginx:1.29-alpine

# Copy the public directory
COPY . /app/public/

# Copy the nginx config file
COPY ./site.conf /etc/nginx/conf.d/default.conf

EXPOSE 80