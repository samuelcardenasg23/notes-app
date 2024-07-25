# Define variables
DB_NAME=db_name
DB_USER=db_user
DB_PASSWORD=db_password
LARAVEL_ENV=.env
FRONTEND_DIR=frontend
BACKEND_DIR=backend

command_exists() {
    command -v "$1" >/dev/null 2>&1
}

# Check for required commands
if ! command_exists php; then
    echo "PHP is not installed. Please install PHP."
    exit 1
fi

if ! command_exists composer; then
    echo "Composer is not installed. Please install Composer."
    exit 1
fi

if ! command_exists npm; then
    echo "NPM is not installed. Please install Node.js and NPM."
    exit 1
fi

if ! command_exists mysql; then
    echo "MySQL is not installed. Please install MySQL."
    exit 1
fi

# Set up backend
echo "Setting up backend..."
cd $BACKEND_DIR

# Install backend dependencies
composer install

# Copy .env.example to .env if it doesn't exist
if [ ! -f $LARAVEL_ENV ]; then
    cp .env.example $LARAVEL_ENV
fi

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Set up frontend
echo "Setting up frontend..."
cd ../$FRONTEND_DIR

# Install frontend dependencies
npm install

# Build the frontend
npm run dev

# Start Laravel server
cd ../$BACKEND_DIR
php artisan serve &

echo "App is running. Access it at http://127.0.0.1:8000"

wait
