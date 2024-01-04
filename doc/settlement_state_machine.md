##  Settlements

### State Machine

---
#### States
Settlements have 3 available states:
- `new` - when the settlement is created,
- `accepted` - when the settlement is accepted by the seller but not yet marked as paid,
- `paid` - when the settlement is paid,

#### Transitions
The state machine has 2 transitions:
- `accept` - moves the settlement from `new` to `accepted` when settlement for given period is accepted by the seller,
- `pay` - moves the settlement from `accepted` to `paid` when the settlement is paid,

#### Callbacks
Out-of-the-box state machine applies `pay` transition during `accept` callback in `SettlementCallbacks`.
If you want to automate this process, you can override `SettlementCallbacks::payout` method in your application to add e.g. payment gateway and webhooks support.
