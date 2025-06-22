<?php
//connecting to database
include "config.php";
// Check if 'id' exists in the URL
if (isset($_GET['ticket_id']) && !empty($_GET['ticket_id'])) {
    $id = intval($_GET['ticket_id']);
} else {
    echo "<div class='alert alert-danger'>Ticket ID is not provided!</div>";
}

//select data query
$sql = "SELECT * FROM tickets WHERE ticket_id = $id";
$result = mysqli_query($conn, $sql);

// Check if query returns valid data
if (!$result || mysqli_num_rows($result) === 0) {
    echo "<div class='alert alert-danger'>IT Ticket not found!</div>";
}

//store value in variable
$ticket = mysqli_fetch_assoc($result);

// form php start
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $priority = $_POST['priority'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    //update query
    $sql = "UPDATE tickets SET `title` = '$title', `priority` = '$priority', `description` = '$description', `status` = '$status' WHERE ticket_id = $id";
    $result = mysqli_query($conn, $sql);
    //Show alert
    if ($result) {
        echo "<script>
        alert('Student record updated successfully!');
        window.location.href = 'index.php';
              </script>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Update failed!</strong> Please check the entered information and try again.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <title>Smart Helpdesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        footer {
            background-color: #232323;
            color: #fff;
            padding: 30px 0;
            margin-top: auto;
            font-size: 0.85rem;
            text-align: center;
        }

        footer a {
            color: #aaa;
            text-decoration: none;
        }

        footer a:hover {
            color: #f1f1f1;
        }

        .navbar {
            background-color: #1a1a1a;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .navbar-nav .nav-link {
            color: #fff;
            padding: 8px 20px;
        }

        .navbar-nav .nav-link:hover {
            color: #f1f1f1;
            background-color: #444;
            border-radius: 4px;
        }

        .navbar .theme-icon {
            font-size: 1.2rem;
            border: none;
            background: none;
            color: white;
            padding: 6px 10px;
            cursor: pointer;
        }

        .dropdown-menu {
            background-color: #1a1a1a;
            border: none;
        }

        .dropdown-menu a {
            color: #fff;
        }

        .dropdown-menu a:hover {
            background-color: #444;
        }

        .theme-icon:hover {
            background-color: #444;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <!-- 🔷 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🎫 Smart Helpdesk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <button class="theme-icon" onclick="toggleTheme()" id="themeToggle"
                            title="Toggle Theme">🌙</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🔶 Main Content -->
    <main class="container mt-4 mb-5 px-2">
        <h1 class="text-center mb-4">Smart Helpdesk – IT Ticket Management</h1>
        <h5 class="text-center mb-4">Edit Ticket</h5>

        <!-- 📝 Update Ticket Form -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-warning text-white">
                <strong>Update Ticket</strong>
            </div>
            <div class="card-body">
                <form method="post" action="edit.php?ticket_id=<?= $id; ?>">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" value="<?= htmlspecialchars($ticket['title']) ?>"
                            class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Priority</label>
                        <select name="priority"
                            class="form-select">
                            <option value="<?= htmlspecialchars($ticket['priority']) ?>"><?= htmlspecialchars($ticket['priority']) ?></option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" value="<?= htmlspecialchars($ticket['description']) ?>"
                            class="form-control" rows="3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="<?= htmlspecialchars($ticket['status']) ?>"><?= htmlspecialchars($ticket['status']) ?></option>
                            <option value="Open">Open</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- 🔻 Footer -->
    <footer>
        <div>
            <p>© 2025 IT Ticketing System. All Rights Reserved.</p>
            <p>Designed by <a href="#">M.Usaid Saddiq</a></p>
            <p>Follow us on <a href="https://www.linkedin.com/in/m-usaid-saddiq-110500320" target="_blank">LinkedIn</a> | <a href="https://github.com/Usaid136" target="_blank">Github</a></p>
        </div>
    </footer>

    <!-- 🌗 Theme Toggle Script -->
    <script>
        function toggleTheme() {
            const htmlEl = document.documentElement;
            const btn = document.getElementById('themeToggle');
            const current = htmlEl.getAttribute('data-bs-theme');
            const next = current === 'dark' ? 'light' : 'dark';
            htmlEl.setAttribute('data-bs-theme', next);
            btn.textContent = next === 'dark' ? '🌞' : '🌙';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>