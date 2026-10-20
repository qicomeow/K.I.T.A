<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Requests | NeighbourLink</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F7F6F0;
            color: #34483B;
        }

        .request-header {
            background: #FFFFFF;
            padding: 18px 7%;
            border-bottom: 1px solid #E6E8DF;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .request-logo {
            color: #52765B;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .back-link {
            color: #52765B;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .request-container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .page-heading h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .page-heading p {
            margin: 0;
            color: #687568;
            line-height: 1.6;
        }

        .request-count {
            display: inline-block;
            margin-top: 18px;
            padding: 8px 14px;
            border-radius: 20px;
            background: #E6EDE2;
            color: #52765B;
            font-size: 13px;
            font-weight: bold;
        }

        .notification-card {
            display: flex;
            gap: 18px;
            margin-bottom: 16px;
            padding: 22px;
            background: #FFFFFF;
            border: 1px solid #E8E9E2;
            border-radius: 16px;
        }

        .notification-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #E6EDE2;
            font-size: 23px;
        }

        .notification-content {
            flex: 1;
            min-width: 0;
        }

        .notification-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
        }

        .notification-title {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .notification-text {
            margin: 8px 0;
            color: #687568;
            font-size: 14px;
            line-height: 1.6;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-pending {
            background: #FFF1D6;
            color: #996600;
        }

        .status-approved {
            background: #E0F1E3;
            color: #287747;
        }

        .status-rejected {
            background: #FCE7E7;
            color: #A63D3D;
        }

        .request-details {
            margin-top: 15px;
            padding: 15px;
            border-radius: 10px;
            background: #F7F9F5;
        }

        .request-details p {
            margin: 7px 0;
            font-size: 14px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .request-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .request-actions form {
            flex: 1;
        }

        .action-button {
            width: 100%;
            padding: 12px 16px;
            border-radius: 9px;
            border: none;
            font: inherit;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .approve-button {
            background: #52765B;
            color: #FFFFFF;
        }

        .approve-button:hover {
            background: #3F6048;
        }

        .reject-button {
            background: #FCE7E7;
            color: #A63D3D;
        }

        .reject-button:hover {
            background: #F8D2D2;
        }

        .request-alert {
            padding: 14px 18px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #E0F1E3;
            color: #285D36;
        }

        .request-alert-error {
            background: #FCE7E7;
            color: #A63D3D;
        }

        .empty-state {
            padding: 55px 25px;
            text-align: center;
            background: #FFFFFF;
            border: 1px solid #E8E9E2;
            border-radius: 16px;
        }

        .empty-state h3 {
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #687568;
        }

        @media (max-width: 600px) {
            .request-container {
                margin-top: 28px;
            }

            .notification-card {
                padding: 16px;
                gap: 12px;
            }

            .notification-icon {
                width: 40px;
                height: 40px;
                font-size: 19px;
            }

            .notification-top {
                flex-direction: column;
            }

            .request-actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <header class="request-header">
        <a href="{{ route('home') }}" class="request-logo">
            NeighbourLink
        </a>

        <a href="{{ route('community.my-items') }}" class="back-link">
            ← Back to My Items
        </a>
    </header>

    <main class="request-container">

        <div class="page-heading">
            <h1>🔔 Borrow Requests</h1>
            <p>
                Manage borrowing requests from your neighbours.
                Approve or reject requests for items you own.
            </p>

            <span class="request-count">
                {{ $bookings->where('status', 'pending')->count() }}
                Pending Requests
            </span>
        </div>

        @if (session('success'))
            <div class="request-alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="request-alert request-alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @forelse ($bookings as $booking)

            <article class="notification-card">

                <div class="notification-icon">
                    📦
                </div>

                <div class="notification-content">

                    <div class="notification-top">
                        <h3 class="notification-title">
                            {{ $booking->communityItem->name }}
                        </h3>

                        <span class="status-badge status-{{ $booking->status }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>

                    <p class="notification-text">
                        <strong>{{ $booking->borrower->name }}</strong>
                        wants to borrow your item.
                    </p>

                    <div class="request-details">
                        <p>
                            📅 <strong>Start Date:</strong>
                            {{ $booking->start_date->format('d M Y') }}
                        </p>

                        <p>
                            📅 <strong>Return Date:</strong>
                            {{ $booking->end_date->format('d M Y') }}
                        </p>

                        @if ($booking->message)
                            <p>
                                💬 <strong>Message:</strong>
                                {{ $booking->message }}
                            </p>
                        @endif
                    </div>

                    @if ($booking->status === 'pending')

                        <div class="request-actions">

                            <form
                                action="{{ route('borrow.approve', $booking) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="action-button approve-button"
                                >
                                    ✓ Approve
                                </button>
                            </form>

                            <form
                                action="{{ route('borrow.reject', $booking) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="action-button reject-button"
                                    onclick="return confirm('Reject this borrowing request?')"
                                >
                                    ✕ Reject
                                </button>
                            </form>

                        </div>

                    @endif

                </div>
            </article>

        @empty

            <div class="empty-state">
                <h3>📭 No Borrow Requests Yet</h3>
                <p>
                    When someone requests to borrow your items,
                    their requests will appear here.
                </p>
            </div>

        @endforelse

    </main>
</body>
</html>