FROM node:21-alpine

WORKDIR /var/www/html

# Change current user
USER node


EXPOSE 5173

CMD ["sh", "-c", "npm install && npm run dev -- --host"]
