<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# ITI_Larvel_labs

## **🚀 Features Implemented**

✅ Add a new post

✅ Edit an existing post

✅ Delete a post

✅ Display all posts dynamically

✅ Use Blade templates for UI

✅ Style with Tailwind CSS

✅ Use Vite for asset bundling

✅ Authentication with Laravel Sanctum

✅ API Endpoints for Posts

✅ Middleware for Authentication

✅ Eloquent API Resource & Pagination

✅ Eager Loading for Optimization

✅ Validation with Form Requests

✅ Error Handling & Validation Messages

---

## **📂 Project Structure**

- `routes/web.php` → Defines the routes for handling post-related operations
- `routes/api.php` → Defines API routes
- `app/Http/Controllers/PostsController.php` → Contains the logic for managing posts
- `resources/views/` → Blade templates for rendering the UI
    - `index.blade.php` → Displays all posts
    - `create.blade.php` → Form to add a new post
    - `show.blade.php` → View details of a post
    - `layout.blade.php` → Main layout for the project
- `app/Http/Requests/StorePostRequest.php` → Handles validation for storing posts
- `app/Http/Requests/UpdatePostRequest.php` → Handles validation for updating posts
- `app/Http/Resources/PostResource.php` → Formats API responses for posts
- `app/Http/Resources/UserResource.php` → Formats API responses for users

---

## **⚡ How It Works**

### **1️⃣ Viewing Posts**

- The homepage (`index.blade.php`) lists all available posts.
- Each post has an edit and delete option.

### **2️⃣ Creating a Post**

- Clicking the **"Add Post"** button navigates to the `create.blade.php` form.
- The form submits data via a **POST request** to store the post.

### **3️⃣ Editing a Post**

- Clicking **"Edit"** on a post opens a pre-filled form (`edit.blade.php`).
- The form sends a **PUT request** to update the post.

### **4️⃣ Deleting a Post**

- Clicking **"Delete"** removes the post using a **DELETE request**.

### **5️⃣ API Endpoints**

Implemented the following API routes in `routes/api.php`:

- `GET /api/posts` - Retrieve all posts with pagination.
- `GET /api/posts/{id}` - Retrieve a specific post.
- `POST /api/posts` - Store a new post.

### **6️⃣ Middleware for Authentication**

- Applied **auth:sanctum** middleware to protect API routes.

### **7️⃣ Eloquent API Resource & Pagination**

- Used `PostResource` and `UserResource` for API responses.
- Implemented pagination for post listings.

### **8️⃣ Eager Loading for Optimization**

- Applied **Eager Loading** when fetching posts to include user data (`Post::with('user')->paginate(10)`).

### **9️⃣ Validation & Security**

- Ensured title uniqueness and required fields.
- Prevented unauthorized `post_creator` modifications.
- Implemented user-friendly validation messages.
- Ensured errors are returned in API responses.

---

## **🛠️ Setup & Run**

### **1️⃣ Install Dependencies**

```
npm install --legacy-peer-deps
composer install

```

### **2️⃣ Set Up Environment**

Copy `.env.example` to `.env` and update database credentials.

```
cp .env.example .env
php artisan key:generate

```

### **3️⃣ Run Migrations & Seeders**

```
php artisan migrate --seed

```

### **4️⃣ Start the Development Server**

```
npm run dev
php artisan serve

```

---

## **🧪 API Testing with Postman**

- Use **Postman** to test API endpoints.
- Add `Authorization: Bearer YOUR_TOKEN_HERE` in headers for protected routes.