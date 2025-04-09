<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Items - Frostine Bakery</title>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/order_items.css">
    <link rel="icon" href="assets/images/logo.jpg">
</head>

<body>
    <?php include 'views/includes/header.php'; ?>

    <main>
        <div class="order-container">
            <h2>Customer Requests</h2>

            <table>
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($feedbacks) && count($feedbacks) > 0): ?>
                        <?php foreach ($feedbacks as $fb): ?>
                            <tr>
                                <td>REQ<?= htmlspecialchars($fb['id']) ?></td>
                                <td><?= htmlspecialchars($fb['customer_name']) ?></td>
                                <td><?= htmlspecialchars($fb['email']) ?></td>
                                <td><?= htmlspecialchars($fb['message']) ?></td>
                                <td><?= htmlspecialchars($fb['created_at']) ?></td>
                                <td><?= htmlspecialchars($fb['status']) ?></td>
                                <td>
                                    <form method="POST" action="index.php?page=update_feedback_status" style="display:inline;">
                                        <input type="hidden" name="feedback_id" value="<?= $fb['id'] ?>">
                                        <input type="hidden" name="status" value="Responded">
                                        <button type="submit">Mark Responded</button>
                                    </form>
                                    <form method="POST" action="index.php?page=update_feedback_status" style="display:inline;">
                                        <input type="hidden" name="feedback_id" value="<?= $fb['id'] ?>">
                                        <input type="hidden" name="status" value="Resolved">
                                        <button type="submit">Mark Resolved</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No feedbacks found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>

        </div>
    </main>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>