class TrackingCodes {
  category;
  run;

  constructor(category, script) {
    this.category = category;
    this.script = script;
    this._executed = false;
  }

  execute() {
    if (this._executed) return;

    const script = new Function(this.script);
    script();
    this._executed = true;
  }
}

export default TrackingCodes;
